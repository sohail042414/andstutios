<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%application_category}}".
 *
 * @property integer $application_id
 * @property integer $category_id
 *
 * @property Application $application
 * @property Category $category
 */
class ApplicationCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%application_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['application_id', 'category_id'], 'required'],
            [['application_id', 'category_id'], 'integer'],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['application_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'application_id' => 'Application ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication() {
        return $this->hasOne(Application::className(), ['id' => 'application_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}
