<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ImageSize */

$this->title = 'Create Image Size';
$this->params['breadcrumbs'][] = ['label' => 'Image Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-size-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
