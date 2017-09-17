<?php

namespace backend\models;

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
class Setting extends \common\models\Setting {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['group_id', 'key', 'title', 'value'], 'required'],
            [['group_id', 'system'], 'integer'],
            [['description'], 'string'],
            [['key'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 200],
            [['key'], 'unique'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => SettingGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
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

}
