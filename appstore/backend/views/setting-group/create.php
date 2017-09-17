<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SettingGroup */

$this->title = 'Create Setting Group';
$this->params['breadcrumbs'][] = ['label' => 'Setting Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
