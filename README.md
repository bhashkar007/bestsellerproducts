<img src="https://github.com/bhashkar007/bestsellerproducts/blob/master/src/icon.svg" width="100">

# Best Seller Products plugin for Craft CMS 3.x

Best Seller Product is a Craft CMS plugin that helps you to get best selling products in your Commerce Store.

## Requirements

- Craft CMS 3.x
- Craft Commerce 2.x

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require by/best-seller-products

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Best Seller Products.

## Using Best Seller Products

To simply get a list of best selling product IDs, use :

	{% set bestSellerProductIds = craft.bestSellerProducts.getBSPIds(limit) %}
	{% set bestsellers = craft.products.id(bestSellerProductIds).all() %}

To get the Number of Times a product has been bought, use:
		
	{% for bsp in craft.bestSellerProducts.getBSP(limit) %}
	    {{ bsp.purchasableId }} -- {{ bsp.times_bought }}
	{% endfor %}
        
`craft.bestSellerProducts.getBSP(limit)` will return an array cointaing `purchasableId` and `times_bought`

`limit` is the no. of products you would like to get. Default is **10**

---

Brought to you by [Bhashkar Yadav](http://sidd3.com)
