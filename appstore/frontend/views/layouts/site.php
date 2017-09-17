<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\PicoloAsset;
use common\widgets\Alert;

PicoloAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
        <?php // $this->registerCssFile(Yii::$app->homeUrl . 'css/picolo/bootstrap.css'); ?>
        <?php // $this->registerCssFile(Yii::$app->homeUrl . 'css/picolo/bootstrap-responsive.css'); ?>
        <?php // $this->registerCssFile(Yii::$app->homeUrl . 'css/picolo/prettyPhoto.css'); ?>
        <?php // $this->registerCssFile(Yii::$app->homeUrl . 'css/picolo/flexslider.css'); ?>
        <?php // $this->registerCssFile(Yii::$app->homeUrl . 'css/picolo/custom-styles.css'); ?>
    </head>
    <body class="home">
        <?php $this->beginBody() ?>

        <!-- Color Bars (above header)-->
        <div class="color-bar-1"></div>
        <div class="color-bar-2 color-bg"></div>

        <div class="container">

            <?php echo $this->render('//partials/header'); ?>

            <?= $content ?>

        </div>

        <?php echo $this->render('//partials/footer'); ?>
        <!-- Scroll to Top -->  
        <div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
