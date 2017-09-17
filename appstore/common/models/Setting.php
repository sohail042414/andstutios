<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $system
 * @property string $key
 * @property string $value
 * @property string $title
 * @property string $description
 *
 * @property SettingGroup $group
 */
class Setting extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'system' => 'System defined',
            'key' => 'Key',
            'value' => 'Value',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup() {
        return $this->hasOne(SettingGroup::className(), ['id' => 'group_id']);
    }

}
