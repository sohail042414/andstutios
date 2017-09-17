<?php

use yii\db\Migration;

class m170722_200941_create_table_application_category extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {
        $this->createTable('{{%application_category}}', [
            'application_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_application_category_pkey', 'application_category', ['application_id', 'category_id']);

        $this->addForeignKey('fk_application_category_application_id', '{{%application_category}}', 'application_id', '{{%application}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_application_category_category_id', '{{%application_category}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown() {

        $this->dropForeignKey('fk_application_category_application_id', 'application_category');
        $this->dropForeignKey('fk_application_category_category_id', 'application_category');
        $this->dropTable('{{%application_category}}');
    }

}
