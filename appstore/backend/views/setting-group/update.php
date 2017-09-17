<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SettingGroup */

$this->title = 'Update Setting Group: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Setting Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
