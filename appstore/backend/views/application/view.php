<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>


    <?=
    Tabs::widget([
        'items' => [
            [
                'label' => 'General',
                'content' => DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'status:boolean',
                        'title',
                        'package_id',
                        'short_description:text',
                        'description:ntext',
                        'playstore_url:ntext',
                        'version',
                        'user_id',
                        [
                            'attribute' => 'user.display_name',
                            'label' => 'User'
                        ],
                        'special:boolean',
                        'featured:boolean',
                        [
                            'attribute' => 'updatedBy.display_name',
                            'label' => 'Updated By'
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]),
                'active' => TRUE,
            ],
            [
                'label' => 'Images',
                'content' => GridView::widget([
                    'dataProvider' => $imageDataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'application_id',
                        'name',
                        'type',
                    ],
                ])
            ],
    ]]);
    ?>

</div>
