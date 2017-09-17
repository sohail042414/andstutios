<?php

use yii\db\Migration;

class m170722_200912_create_table_application extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'package_id' => $this->string(255)->notNull()->unique(),
            'title' => $this->string(50)->notNull(),
            'short_description' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'playstore_url' => $this->text()->notNull(),
            'version' => $this->float()->defaultValue(1.0),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->boolean()->defaultValue(TRUE),
            'special' => $this->boolean()->defaultValue(FALSE),
            'featured' => $this->boolean()->defaultValue(FALSE),
            'updated_by' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_application_user_id', '{{%application}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown() {
        $this->dropForeignKey('fk_application_user_id', '{{%application}}');
        $this->dropTable('{{%application}}');
    }

}
