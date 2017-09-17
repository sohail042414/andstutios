<?php

namespace common\models;

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
class ImageSize extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%image_size}}';
    }

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
