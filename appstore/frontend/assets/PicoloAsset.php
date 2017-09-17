<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle for picolo theme
 */
class PicoloAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'picolo/css/bootstrap.css',
        'picolo/css/bootstrap-responsive.css',
        'picolo/css/flexslider.css',
        'picolo/css/prettyPhoto.css',
        'picolo/css/custom-styles.css',
    ];
    public $js = [
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

}
