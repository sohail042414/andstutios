<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%application_image}}".
 *
 * @property integer $id
 * @property integer $application_id
 * @property string $name
 * @property string $type
 *
 * @property Application $application
 */
class ApplicationImage extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%application_image}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'application_id' => 'Application ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication() {
        return $this->hasOne(Application::className(), ['id' => 'application_id']);
    }

    /**
     * 
     */
    public function getImagesPath() {

        $setting = \backend\models\Setting::find()->where(['key' => 'images_upload_path'])->one();

        if (is_object($setting)) {
            return rtrim($setting->value, '/') . '/';
        }

        return '';
    }
    
}
