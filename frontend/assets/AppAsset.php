<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/animate.css',
        'css/bootstrap.css',
        'css/flexslider.css',
        'css/popuo-box.css',
        'css/style.css',
        'css/swipebox.css',
    ];
    public $js = [
        'js/easing.js',
        'js/jquery.flexslider.js',
        'js/jquery.min.js',
        'js/jquery.mixitup.min.js',
        'js/jquery.swipebox.min.js',
        'js/jquery-1.11.1.min.js',
        'js/menu_jquery.js',
        'js/move-top.js',
        'js/wow.min.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
