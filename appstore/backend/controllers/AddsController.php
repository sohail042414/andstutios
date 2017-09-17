<?php

namespace backend\controllers;

use Yii;
use backend\models\Application;
use backend\models\SearchApplication;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\components\BackController;

/**
 * ApplicationController implements the CRUD actions for Application model.
 */
class AddsController extends BackController {

    /**
     * Lists all Application models.
     * @return mixed
     */
    public function actionIndex() {

        $model = new Application();

        return $this->render('index', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate() {

        $model = new Application();

        $model->replaceAddsFile();

        $this->redirect('index');
    }

}
