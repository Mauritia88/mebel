<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css'
    ];
    public $js = [
        'js/jquery.scrollUp.min.js',
        'js/price-range.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.cookie.js',
        'js/jquery.accordion.js',
        'js/salvattore.min.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset'
    ];

    public function registerAssetFiles($view) {

        parent::registerAssetFiles($view);

        $manager = $view->getAssetManager();
        $view->registerJsFile(
            $manager->getAssetUrl(
                $this,
                'js/html5shiv.min.js'
            ),
            [
                'condition' => 'lte IE9',
                'position'=>View::POS_HEAD
            ]
        );
        $view->registerJsFile(
            $manager->getAssetUrl(
                $this,
                'js/respond.min.js'
            ),
            [
                'condition' => 'lte IE9',
                'position'=>View::POS_HEAD
            ]
        );
    }
}
