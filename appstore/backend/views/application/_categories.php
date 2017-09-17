<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use backend\models\ApplicationCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="application-form">


    <div class="col-lg-4 col-md-4">

        <h2>Add categories</h2>

        <div class="application-image-form">

            <?php $form = ActiveForm::begin(); ?>

            <?php echo Html::hiddenInput('ApplicationCategory[application_id]', $appliationCategoryModel->application_id) ?>

            <?= $form->field($appliationCategoryModel, 'category_id')->dropDownList(ArrayHelper::map(\backend\models\Category::find()->all(), 'id', 'title'), ['prompt' => 'Select']) ?>

            <div class="form-group">
                <?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>


    <div class="col-lg-8 col-md-8">
        <h2>Application belongs to</h2>
        <?=
        GridView::widget([
            'dataProvider' => $categoryDataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'category.title',
                    'label' => 'Category'
                ],
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
                            $url = 'deletecategory?application_id=' . $model->application_id . '&category_id=' . $model->category_id;
                            return $url;
                        }
                    }
                ],
            ],
        ]);
        ?>
    </div>


</div>
