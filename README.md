# Price Decimal for Magento 2

This extension will allow you to remove only .00 from your frontend product prices.

Remove ".00" decimal from price in magento2

For Example,

$500.00 => $500

$19.99 => $19.99

**Removes from:**

 1. Catalog Page
 2. Product view page
 3. Compare page
 4. Cart page
 5. Checkout page
 6. Recently Viewed Product widget
 7. Mention if you know other places ;)


<h1>Installation</h1>
To make the integration process as easy as possible for you, we have developed various plugins for your webshop software package. This is the manual for installing the Magento® 2 Plugin. Before you start up the installation process, we recommend that you make a backup of your webshop files, as well as the database.

**Installation using Composer**
Magento® 2 use the Composer to manage the module package and the library. Composer is a dependency manager for PHP. Composer declare the libraries your project depends on and it will manage (install/update) them for you.

Check if your server has composer installed by running the following command:

<code>composer –v</code>
If your server doesn’t have composer installed, you can easily install it by using this manual: https://getcomposer.org/doc/00-intro.md

Step-by-step to install the Magento 2 extension through Composer:

1. Connect to your server running Magento® 2 using SSH or other method (make sure you have access to the command line).
2. Locate your Magento® 2 project root.
3. Install the Magento® 2 extension through composer and wait till it's completed:

   <code>composer require sagoontech/magento2-price-decimal</code>

6. Once completed run the Magento module enable command:

   <code>bin/magento module:enable SagoonTech_Base SagoonTech_PriceDecimal</code>

5. After that run the Magento upgrade
 
   <code>bin/magento setup:upgrade</code>

   If Magento is running in production mode you may also need to redeploy the static content:

   <code>bin/magento setup:static-content:deploy</code>
   
6. Now, run compilation (only if your instance is in production):

   <code>bin/magento setup:di:compile</code>

7. Clear the cache

   <code>bin/magento cache:flush</code>

8. After the installation: Go to your Magento admin portal and from Menu find "Sagoon Tech > Price Decimal System > Price Decimal Config" and enable it.
