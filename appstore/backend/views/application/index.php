<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchApplication */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'status:boolean',
            'title',
            'package_id',
            'short_description:ntext',
            'playstore_url:ntext',
            'version',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
