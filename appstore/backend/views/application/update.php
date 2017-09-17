<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'Update Application: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="application-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    Tabs::widget([
        'items' => [
            [
                'label' => 'General',
                'content' => $this->render('_form', ['model' => $model]),
                'active' => ($tab == 'general') ? TRUE : FALSE,
            ],
            [
                'label' => 'Images',
                'content' => $this->render('_images', [
                    'model' => $model,
                    'imageDataProvider' => $imageDataProvider,
                    'appliationImageModel' => $appliationImageModel
                ]),
                'active' => ($tab == 'images') ? TRUE : FALSE,
            ],
    ]]);
    ?>

    <?php
    /*
      $this->render('_form', [
      'model' => $model,
      ])
     * 
     */
    ?>

</div>
