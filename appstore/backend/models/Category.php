<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $title
 * @property string $description
 * @property integer $show_in_menu
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ApplicationCategory[] $applicationCategories
 * @property Application[] $applications
 */
class Category extends \common\models\Category {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent', 'show_in_menu', 'created_at', 'updated_at'], 'integer'],
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
            'parent' => 'Parent',
            'title' => 'Title',
            'description' => 'Description',
            'show_in_menu' => 'Show In Menu',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
