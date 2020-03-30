<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%application}}".
 *
 * @property integer $id
 * @property string $title 
 * @property string $package_id
 * @property string $short_description
 * @property string $description
 * @property string $playstore_url
 * @property double $version
 * @property integer $user_id
 * @property integer $status
 * @property integer $special
 * @property integer $featured
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 * @property ApplicationCategory[] $applicationCategories
 * @property Category[] $categories
 */
class Application extends \common\models\Application {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'playstore_url', 'package_id', 'short_description'], 'required'],
            [['description', 'playstore_url', 'package_id', 'short_description'], 'string'],
            [['version'], 'number'],
            [['user_id', 'status', 'special', 'featured', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'package_id' => 'Package Id',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'playstore_url' => 'Playstore Url',
            'version' => 'Version',
            'user_id' => 'Owner',
            'status' => 'Status',
            'special' => 'Special',
            'featured' => 'Featured',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function displayAdds() {
        return "<pre>" . print_r($this->prepareAddsJson(TRUE), true) . "</pre>";
    }

    public function prepareAddsJson($pretty = FALSE) {

        $output = [
            'Version' => $this->getAddsNextVersion(),
            'AppsList-Android' => $this->getAdds()
        ];

        if ($pretty) {
            return json_encode($output, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        return json_encode($output, JSON_UNESCAPED_SLASHES);
    }

    /**
     * 
     * @return json
     */
    public function getAdds() {

        $applications = $this->find()->where(['status' => 1])->asArray()->all();

        $adds = array();

        $types = array('BackAd', 'MainAd', 'BannerAd');

        foreach ($applications as $app) {

            $images = \backend\models\ApplicationImage::find()->where(['application_id' => $app['id']])->asArray()->all();

            foreach ($images as $image) {

                if (in_array($image['type'], $types)) {
                    $adds[] = [
                        'AdType' => $image['type'],
                        'AppTitle' => $app['title'],
                        'IconUrl' => $this->prepareImageUrl($image['name']),
                        'Id' => $app['package_id'],
                    ];
                }
            }
        }

        return $adds;
    }

    public function getCurrentAdds() {

        return file_get_contents($this->getFilePath());
    }

    public function getFilePath() {

        $setting = \backend\models\Setting::find()->where(['key' => 'adds_file'])->one();
        return \yii\helpers\Url::to($setting->value);
    }

    public function displayCurrentAdds() {

        return "<pre>" . $this->getCurrentAdds() . "</pre>";
    }

    private function getAddsCurrentVersion() {

        $data = json_decode($this->getCurrentAdds());

        return isset($data->Version) ? $data->Version : 1;
    }

    private function getAddsNextVersion() {
        return $this->getAddsCurrentVersion() + 1;
    }

    private function prepareImageUrl($name) {

        $setting = \frontend\models\Setting::find()->where(['key' => 'images_base_url'])->one();

        if (is_object($setting)) {
            return $setting->value . $name;
        }

        return $name;
    }

    public function replaceAddsFile() {

        $data = $this->prepareAddsJson(TRUE);

        $this->renameOld();

        $this->writeNew($data);
    }

    private function renameOld() {

        if (is_file($this->getFilePath())) {

            $setting = \backend\models\Setting::find()->where(['key' => 'adds_path'])->one();

            $dir = pathinfo($setting->value, PATHINFO_DIRNAME);
            //$newName = \yii\helpers\Url::to($setting->value) . 'AddsFile' . date('Y-m-d : h:i:s') . '.json';
            $newName = $dir. '/AddsFile' . date('Y-m-d : h:i:s') . '.json';            
            //$newName =  '/home1/andstuti/public_html/adds/AddsFile' . date('Y-m-d : h:i:s') . '.json';
            //$newName =  '/var/www/html/andstutios/public_html/AndAds/AddsFile' . date('Y-m-d : h:i:s') . '.json';
            
            rename($this->getFilePath(), $newName);
        }
    }

    private function writeNew($data) {

        $fp = fopen($this->getFilePath(), 'w');

        fwrite($fp, $data);

        fclose($fp);
    }

    public function beforeDelete() {

        if (!parent::beforeDelete()) {
            return false;
        }

        $applicationImage = new \backend\models\ApplicationImage();

        $applicationImage->application_id = $this->id;

        $applicationImage->deleteAppImages();


        $applicationCategory = new \backend\models\ApplicationCategory();

        $applicationCategory->application_id = $this->id;

        $applicationCategory->deleteAppCategories();


        return true;
    }

}
