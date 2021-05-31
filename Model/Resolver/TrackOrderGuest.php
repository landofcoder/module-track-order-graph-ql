<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\TrackorderGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\GraphQl\Model\Query\ContextInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactoryInterface;
use Magento\SalesGraphQl\Model\Formatter\Order as OrderFormatter;
use Magento\SalesGraphQl\Model\Resolver\CustomerOrders\Query\OrderFilter;
use Magento\Sales\Api\OrderRepositoryInterface;

/**
 * TrackOrderGuest data reslover
 */
class TrackOrderGuest implements ResolverInterface
{
    /**
     * @var CollectionFactoryInterface
     */
    private $collectionFactory;

    /**
     * @var OrderFormatter
     */
    private $orderFormatter;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var \Ves\Trackorder\Helper\Data
     */
    protected $_trackorderHelper;

    /**
     * @param CollectionFactoryInterface $collectionFactory
     * @param OrderRepositoryInterface $orderRepository
     * @param OrderFormatter $orderFormatter
     * @param \Ves\Trackorder\Helper\Data $data
     */
    public function __construct(
        CollectionFactoryInterface $collectionFactory,
        OrderRepositoryInterface $orderRepository,
        OrderFormatter $orderFormatter,
        \Ves\Trackorder\Helper\Data $data
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->orderFormatter = $orderFormatter;
        $this->orderRepository = $orderRepository;
        $this->_trackorderHelper = $data;
    }

    /**
     * @inheritDoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        /** @var ContextInterface $context */
        if(!$this->_trackorderHelper->getConfig('trackorder_general/enabled')){
            throw new GraphQlAuthorizationException(__('The function is not available.'));
        }
        $items = [];
        $order_id = isset($args["order_id"])?trim($args["order_id"]):"";
        $code = isset($args["code"])?trim($args["code"]):"";
        $email = isset($args["email"])?trim($args["email"]):"";

        if(!$order_id && !$code && !$email){
            throw new GraphQlInputException(__('Required parameter "order_id" and "email" or "code" is missing'));
        }elseif($order_id && !$code && !$email){
            throw new GraphQlInputException(__('Required parameter "email" is missing'));
        }elseif(!$order_id && !$code && $email){
            throw new GraphQlInputException(__('Required parameter "order_id" is missing'));
        }
        $orders = $this->collectionFactory->create();
        if($order_id && $email){
            $orders->addFieldToFilter("increment_id", $order_id);
            $orders->addFieldToFilter("customer_email", $email);
        }else{
            $orders->addAttributeToFilter("track_link", $code);
        }
        if($orders->getSize()){
            $orderModel = $orders->getFirstItem();
            return $this->orderFormatter->format($orderModel);
        }else {
            $customMessage = $this->_trackorderHelper->getConfig('trackorder_general/custom_message');
            if(!$customMessage){
                $customMessage = 'Order Not Found. Please try again later';
            }
            throw new GraphQlInputException(__($customMessage));
        }
    }
}
