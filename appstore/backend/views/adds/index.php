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

    <?php if(!$model->canReadAdds()){ ?>
        <div class="alert alert-danger">Adds file path (<?php echo $model->getFilePath(); ?>) is not readable,make sure directory exists and has correct permissions!</div>
    <?php } ?>

    <?php if(!$model->canWriteAdds()){ ?>
        <div class="alert alert-danger">Adds file path (<?php echo $model->getFilePath(); ?>) is not writable,make sure directory exists and has correct permissions!</div>
    <?php } ?>

    <p>
        <?php
        if($model->canReadAdds() && $model->canWriteAdds()){
           echo Html::a('Update Adds to Next Version', ['update'], [
                'class' => 'btn btn-primary',
                'data' => [
                    'confirm' => 'Are you sure you want to update?',
                    'method' => 'post',
                ],
            ]);
        }
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
