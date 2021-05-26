# Ves_Trackorder Pro version

With our Magento 2 Order Status Tracking, you can let your customers track their order status right after they complete their payment for their purchase. Customers can do the tracking with just the order ID and their email address without any need to log in.

## Features

- Tracking order information Without Login FEATURED
- Send order information to email
- Customer can send order info to any other email address
- Generate order QR codes to check order status FEATURED
- Add link on main-menu & top link
- Show shipment tracking link and tracking code
- Display custom messages if order is not found
- Reorder without login
- Easily tracking order summary in the front end
- Support for all the Magento Product Types
- Your customers can easily track
- Track order status, print order directly
- Attach Invoice PDF File To Email
- Mobile & tablet Optimized
- Place anywhere with widget support
- Get Track Code 

## Require Extensions
- venustheme/module-all
- venustheme/module-trackorder-pro

## Example Graph Ql Query

1. Track via Tracking Code:

``
{
lofTrackMyOrder(code: "8QH9524EN"){
  id
  order_date
  status
  number
  carrier
  shipping_address{
    firstname
    lastname
    region
    country_code
    company
    postcode
    city
  }
  items{
    id
    product_name
    product_sku
    product_type
    product_sale_price{
      currency
      value
    }
    quantity_ordered
    quantity_shipped
    quantity_invoiced
    quantity_refunded
  }
}
}
``

2. Track via Order Increment Id:

{
lofTrackMyOrder(order_od: "000000012"){
  id
  order_date
  status
  number
  carrier
  shipping_address{
    firstname
    lastname
    region
    country_code
    company
    postcode
    city
  }
  items{
    id
    product_name
    product_sku
    product_type
    product_sale_price{
      currency
      value
    }
    quantity_ordered
    quantity_shipped
    quantity_invoiced
    quantity_refunded
  }
}
}

## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/allorderdesk)


**Our Magento 2 Extensions List**
* [Megamenu for Magento 2](https://landofcoder.com/magento-2-mega-menu-pro.html/)

* [Page Builder for Magento 2](https://landofcoder.com/magento-2-page-builder.html/)

* [Magento 2 Marketplace - Multi Vendor Extension](https://landofcoder.com/magento-2-marketplace-extension.html/)

* [Magento 2 Multi Vendor Mobile App Builder](https://landofcoder.com/magento-2-multi-vendor-mobile-app.html/)

* [Magento 2 Form Builder](https://landofcoder.com/magento-2-form-builder.html/)

* [Magento 2 Reward Points](https://landofcoder.com/magento-2-reward-points.html/)

* [Magento 2 Flash Sales - Private Sales](https://landofcoder.com/magento-2-flash-sale.html)

* [Magento 2 B2B Packages](https://landofcoder.com/magento-2-b2b-extension-package.html)

* [Magento 2 One Step Checkout](https://landofcoder.com/magento-2-one-step-checkout.html/)

* [Magento 2 Customer Membership](https://landofcoder.com/magento-2-membership-extension.html/)

* [Magento 2 Checkout Success Page](https://landofcoder.com/magento-2-checkout-success-page.html/)


**Featured Magento Services**

* [Customization Service](https://landofcoder.com/magento-2-create-online-store/)

* [Magento 2 Support Ticket Service](https://landofcoder.com/magento-support-ticket.html/)

* [Magento 2 Multi Vendor Development](https://landofcoder.com/magento-2-create-marketplace/)

* [Magento Website Maintenance Service](https://landofcoder.com/magento-2-customization-service/)

* [Magento Professional Installation Service](https://landofcoder.com/magento-2-installation-service.html)

* [Customization Service](https://landofcoder.com/magento-customization-service.html)

