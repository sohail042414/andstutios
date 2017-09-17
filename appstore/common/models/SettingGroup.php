<?php

namespace common\models;

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
class SettingGroup extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%setting_group}}';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings() {
        return $this->hasMany(Setting::className(), ['group_id' => 'id']);
    }

}
