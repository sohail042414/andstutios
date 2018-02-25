<?php

namespace backend\models;

use Yii;
use yii\helpers\Url;

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
class ApplicationImage extends \common\models\ApplicationImage {

    public $imageFile;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['application_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
            [['type'], 'unique', 'message' => '{value} already exists, delete it to upload again!', 'when' => function() {

                    if ($this->type == 'normal') {
                        return FALSE;
                    }

                    $image = $this->find()->where(['application_id' => $this->application_id, 'type' => $this->type])->one();

                    if (is_object($image)) {
                        return TRUE;
                    }

                    return FALSE;
                }
            ],
            [['application_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Application::className(), 'targetAttribute' => ['application_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'png, jpg,jpeg'],
        ];
    }

    public function upload() {

        if ($this->validate()) {

            if (!is_object($this->imageFile)) {
                $this->addError('imageFile', 'Please select and image!');
                return FALSE;
            }

            $newName = 'app-' . $this->application_id . '-' . time() . '-image.' . $this->imageFile->extension;

            if ($this->imageFile->saveAs($this->getImagesPath() . $newName)) {
                $this->name = $newName;
                return TRUE;
            }
        }

        return FALSE;
    }

    public function removeFile() {
        @unlink($this->getImagesPath() . $this->name);
    }

    public function getImageUrl() {

        $setting = \frontend\models\Setting::find()->where(['key' => 'images_base_url'])->one();

        if (is_object($setting)) {
            return $setting->value . $this->name;
        }

        return $this->name;
    }

    public function deleteAppImages() {

        $images = $this->find()->where(['application_id' => $this->application_id])->all();

        foreach ($images as $imageModel) {
            $imageModel->delete();
            //$imageModel->removeFile();
        }
    }

    public function beforeDelete() {
        if (!parent::beforeDelete()) {
            return false;
        }

        $this->removeFile();

        return true;
    }

}
