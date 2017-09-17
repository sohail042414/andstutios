<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%image_size}}".
 *
 * @property integer $id
 * @property string $description
 * @property integer $system
 * @property string $type
 * @property integer $width
 * @property integer $height
 */
class ImageSize extends \common\models\ImageSize {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['description'], 'string'],
            [['system', 'width', 'height'], 'integer'],
            [['type'], 'string', 'max' => 20],
            [['type'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'system' => 'System',
            'type' => 'Type',
            'width' => 'Width(px)',
            'height' => 'Height(px)',
        ];
    }

}
