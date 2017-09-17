<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use common\models\ImageSize;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="application-form">


    <div class="col-lg-4 col-md-4">

        <div class="application-image-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?php //= $form->field($appliationImageModel, 'application_id')->hiddenInput() ?>

            <?php echo Html::hiddenInput('ApplicationImage[application_id]', $appliationImageModel->application_id) ?>

            <?php //$form->field($appliationImageModel, 'name')->textInput(['maxlength' => true])   ?>

            <?= $form->field($appliationImageModel, 'imageFile')->fileInput() ?>

            <?= $form->field($appliationImageModel, 'type')->dropDownList(ArrayHelper::map(ImageSize::find()->all(), 'type', 'type')) ?>

            <div class="form-group">
                <?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>


    <div class="col-lg-8 col-md-8">
        <?=
        GridView::widget([
            'dataProvider' => $imageDataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'application_id',
                'name',
                'type',
                //['class' => 'yii\grid\ActionColumn'],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('app', 'lead-delete'),
                            ]);
                        }
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'delete') {
                            $url = 'deleteimage?imageId=' . $model->id;
                            return $url;
                        }
                    }
                ],
            ],
        ]);
        ?>
    </div>


</div>
