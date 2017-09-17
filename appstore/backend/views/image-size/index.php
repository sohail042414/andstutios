<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchImageSize */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Image Sizes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-size-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Image Size', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'description:ntext',
            'type',
            'system:boolean',
            'width',
            'height',
            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:260px;'],
                'header' => 'Actions',
                'template' => '{view}{update}{delete}',
                'visibleButtons' => [
                    'view' => TRUE,
                    'update' => TRUE,
                    'delete' => function($model) {
                        return $model->system ? FALSE : TRUE;
                    }
                ]
            ]
        ],
    ]);
    ?>
</div>
