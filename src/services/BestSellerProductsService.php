<?php
/**
 * Best Seller Products plugin for Craft CMS 3.x
 *
 * A plugin to get bestseller products
 *
 * @link      http://sidd3.com
 * @copyright Copyright (c) 2018 Bhashkar Yadav
 */

namespace by\bestsellerproducts\services;

use by\bestsellerproducts\BestSellerProducts;

use Craft;
use craft\helpers\Db;
use craft\db\Query;
use craft\base\Component;

/**
 * @author    Bhashkar Yadav
 * @package   BestSellerProducts
 * @since     1.0.0
 */
class BestSellerProductsService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function getBSP($limit)
    {
        $result = (new Query())
            ->select(['(purchasableId - 1) as purchasableId', 'COUNT(purchasableId) as times_bought'])
            ->from(['{{%commerce_lineitems}}'])
            ->orderBy(['times_bought' => SORT_DESC])
            ->groupBy('purchasableId')
            ->limit($limit)
            ->all();

        return $result;
    }

    public function getBSPIds($limit)
    {
        $getPIds = $this->getBSP($limit);
        $result = implode(',',array_column($getPIds, 'purchasableId'));
        return $result;
    }
}
