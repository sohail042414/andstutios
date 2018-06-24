<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchApplication */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    //Yii::$app->formatter->booleanFormat = ['Active', 'Disabled'];

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            return [
                'class' => ($model->status == 1) ? '' : 'danger'
            ];
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'label' => 'Id',
                'value' => function($model) {
                    return $model->id;
                },
                'filter' => false,
            ],
            [
                'label' => 'Image',
                "format" => "raw",
                "value" => function($model) {
                    return '<div class="grid-thumb-image"><a href="' . Url::to(['application/view', 'id' => $model->id]) . '" title="Click to view ' . 	 $model->title . '" target="_blank">' . Html::img($model->dp, ['class' => 'img-thumbnail', 'style' => 'width:60px;height:40px;']) . '</a></div>';
                }
            ],
            'status:boolean',
            'title',
            //'package_id',
            'short_description:ntext',
            //'playstore_url:ntext',
            'version' => [
                'label' => 'Version',
                'filter' => false,
                'value' => function($model) {
                    return $model->id;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
