<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'waitMe/waitMe.min.css',
    ];
    public $js = [
        'waitMe/waitMe.min.js',
        "https://code.highcharts.com/highcharts.js",
        "https://code.highcharts.com/modules/exporting.js",
        "https://code.highcharts.com/modules/export-data.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
