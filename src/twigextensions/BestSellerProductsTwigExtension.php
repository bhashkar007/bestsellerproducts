<?php
/**
 * Best Seller Products plugin for Craft CMS 3.x
 *
 * A plugin to get bestseller products
 *
 * @link      http://sidd3.com
 * @copyright Copyright (c) 2018 Bhashkar Yadav
 */

namespace by\bestsellerproducts\twigextensions;

use by\bestsellerproducts\BestSellerProducts;

use Craft;

/**
 * @author    Bhashkar Yadav
 * @package   BestSellerProducts
 * @since     1.0.0
 */
class BestSellerProductsTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'BestSellerProducts';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('someFunction', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function someInternalFunction($text = null)
    {
        $result = $text . " in the way";

        return $result;
    }
}
