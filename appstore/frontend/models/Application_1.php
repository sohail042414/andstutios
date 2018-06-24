<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%application}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $package_id
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
    public function attributeLabels() {
        return [
            'id' => 'Application Id',
            'title' => 'Title',
            'description' => 'Description',
            'playstore_url' => 'Playstore Url',
            'version' => 'Version',
            'user_id' => 'User ID',
            'special' => 'Special',
            'featured' => 'Featured',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getDisplayImageUrl() {
        $imageObject = \frontend\models\ApplicationImage::find()
                ->where(['application_id' => $this->id, 'type' => 'display'])
                ->one();

        return Yii::getAlias('@web') . '/images/' . $imageObject->name;

        //$url = \yii\helpers\Url::to('frontend/web/uploads/' . $imageObject->name);
        //return \yii\helpers\Url::to('frontend/web/uploads/' . $imageObject->name);
    }

    public function getUrl() {

        if (!empty($this->playstore_url)) {
            return $this->playstore_url;
        }

        return '#';
    }

}
