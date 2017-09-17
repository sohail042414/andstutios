<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchApplication */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=
        Html::a('Update Adds to Next Version', ['update'], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to update?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    Tabs::widget([
        'items' => [
            [
                'label' => 'Current Adds',
                'content' => $model->displayCurrentAdds(),
                'active' => TRUE,
            ],
            [
                'label' => 'New Loaded from database',
                'content' => $model->displayAdds(),
            ],
        ]
    ]);
    ?>

</div>
