<?php
/**
 * Best Seller Products plugin for Craft CMS 3.x
 *
 * A plugin to get bestseller products
 *
 * @link      http://sidd3.com
 * @copyright Copyright (c) 2018 Bhashkar Yadav
 */

namespace by\bestsellerproducts;

use by\bestsellerproducts\services\BestSellerProductsService as BestSellerProductsServiceService;
use by\bestsellerproducts\variables\BestSellerProductsVariable;
use by\bestsellerproducts\twigextensions\BestSellerProductsTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class BestSellerProducts
 *
 * @author    Bhashkar Yadav
 * @package   BestSellerProducts
 * @since     1.0.0
 *
 * @property  BestSellerProductsServiceService $bestSellerProductsService
 */
class BestSellerProducts extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var BestSellerProducts
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new BestSellerProductsTwigExtension());

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('bestSellerProducts', BestSellerProductsVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'best-seller-products',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
