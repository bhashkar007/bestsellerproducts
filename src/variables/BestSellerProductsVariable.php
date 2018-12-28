<?php
/**
 * Best Seller Products plugin for Craft CMS 3.x
 *
 * A plugin to get bestseller products
 *
 * @link      http://sidd3.com
 * @copyright Copyright (c) 2018 Bhashkar Yadav
 */

namespace by\bestsellerproducts\variables;

use by\bestsellerproducts\BestSellerProducts;

use Craft;

/**
 * @author    Bhashkar Yadav
 * @package   BestSellerProducts
 * @since     1.0.0
 */
class BestSellerProductsVariable
{
    // Public Methods
    // =========================================================================

    /**
     * @param null $optional
     * @return string
     */
    public function getBSPIds($limit = 10)
    {
        $result = BestSellerProducts::$plugin->bestSellerProductsService->getBSPIds($limit);
        return $result;
    }
    public function getBSP($limit = 10)
    {
        $result = BestSellerProducts::$plugin->bestSellerProductsService->getBSP($limit);
        return $result;
    }
}
