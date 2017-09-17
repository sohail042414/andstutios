<?php

namespace backend\models;

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
class ApplicationCategory extends \common\models\ApplicationCategory {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['application_id', 'category_id'], 'required'],
            [['application_id', 'category_id'], 'integer'],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['application_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['category_id'], 'unique', 'message' => 'Category already assigned', 'when' => function() {
            
                    $category = $this->find()->where(['application_id' => $this->application_id, 'category_id' => $this->category_id])->one();

                    if (is_object($category)) {
                        return TRUE;
                    }

                    return FALSE;
                }
            ],
        ];
    }

}
