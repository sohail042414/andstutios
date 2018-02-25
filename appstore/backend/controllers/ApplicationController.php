<?php

namespace backend\controllers;

use Yii;
use backend\models\Application;
use backend\models\SearchApplication;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SearchApplicationImage;
use yii\web\UploadedFile;
use backend\components\BackController;

/**
 * ApplicationController implements the CRUD actions for Application model.
 */
class ApplicationController extends BackController {

    /**
     * Lists all Application models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SearchApplication();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Application model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        $searchImageModel = new SearchApplicationImage();
        $imageDataProvider = $searchImageModel->search(['SearchApplicationImage' => ['application_id' => $id]]);

        $searchCategoryModel = new \backend\models\SearchApplicationCategory();
        $categoryDataProvider = $searchCategoryModel->search(['SearchApplicationCategory' => ['application_id' => $id]]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'imageDataProvider' => $imageDataProvider,
                    'categoryDataProvider' => $categoryDataProvider,
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Application();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $tab = Yii::$app->request->get('tab', 'general');

        $appliationImageModel = new \backend\models\ApplicationImage;
        $appliationImageModel->application_id = $id;

        $searchImageModel = new SearchApplicationImage();
        $imageDataProvider = $searchImageModel->search(['SearchApplicationImage' => ['application_id' => $id]]);

        $appliationCategoryModel = new \backend\models\ApplicationCategory();
        $appliationCategoryModel->application_id = $id;

        $searchCategoryModel = new \backend\models\SearchApplicationCategory();
        $categoryDataProvider = $searchCategoryModel->search(['SearchApplicationCategory' => ['application_id' => $id]]);


        $post = Yii::$app->request->post();

        if (isset($post['ApplicationImage'])) {

            $tab = 'images';

            $appliationImageModel->imageFile = UploadedFile::getInstance($appliationImageModel, 'imageFile');

            if ($appliationImageModel->upload() && $appliationImageModel->load($post)) {

                $appliationImageModel->save();
            }
        }


        if (isset($post['ApplicationCategory'])) {

            $tab = 'categories';

            if ($appliationCategoryModel->load($post) && $appliationCategoryModel->save()) {
                
            }
        }



        if (isset($post['Application'])) {

            if ($model->load($post) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('update', [
                    'model' => $model,
                    'tab' => $tab,
                    'imageDataProvider' => $imageDataProvider,
                    'appliationImageModel' => $appliationImageModel,
                    'categoryDataProvider' => $categoryDataProvider,
                    'appliationCategoryModel' => $appliationCategoryModel
        ]);
    }

    /**
     * Deletes an existing Application model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an application image,  existing Application model.
     * If deletion is successful, the browser will be redirected to the respective application update page.
     * @param integer $imageId
     * @return mixed
     */
    public function actionDeleteimage($imageId) {

        $imageModel = \backend\models\ApplicationImage::findOne($imageId);
        
        $application_id = $imageModel->application_id;

        $imageModel->delete();

        return $this->redirect(['update', 'id' => $application_id, 'tab' => 'images']);
    }

    /**
     * Deletes an application category,  existing Application model.
     * If deletion is successful, the browser will be redirected to the respective application update page.
     * @param integer $imageId
     * @return mixed
     */
    public function actionDeletecategory($application_id, $category_id) {

        $applicaitonCategoryModel = \backend\models\ApplicationCategory::findOne(['application_id' => $application_id, 'category_id' => $category_id]);

        $applicaitonCategoryModel->delete();

        return $this->redirect(['update', 'id' => $application_id, 'tab' => 'categories']);
    }

    /**
     * Finds the Application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Application::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
