<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%setting_group}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 *
 * @property Setting[] $settings
 */
class SettingGroup extends \common\models\SettingGroup {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

}
