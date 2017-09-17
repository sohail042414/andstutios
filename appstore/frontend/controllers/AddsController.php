<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Application;
use frontend\models\ApplicationImage;

/**
 * Site controller
 */
class AddsController extends Controller {

    /**
     * Renders adds as json file. 
     *
     * @return mixed
     */
    public function actionIndex() {

        $applications = Application::find()->where(['status' => 1])->asArray()->all();

        $adds = array();

        $types = array('BackAd', 'MainAd', 'BannerAd');


        foreach ($applications as $app) {

            $images = ApplicationImage::find()->where(['application_id' => $app['id']])->asArray()->all();


            foreach ($images as $image) {

                if (in_array($image['type'], $types)) {
                    $adds[] = [
                        'AdType' => $image['type'],
                        'AppTitle' => $app['title'],
                        'IconUrl' => $image['name'],
                        'Id' => $app['package_id'],
                    ];
                }
            }
        }



        $output = [
            'Version' => 6,
            'AppsList-Android' => $adds
        ];

        //echo "<pre>";

        print_r(json_encode($output, JSON_PRETTY_PRINT));

        exit;
    }

}
