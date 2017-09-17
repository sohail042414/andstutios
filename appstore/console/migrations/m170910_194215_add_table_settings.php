<?php

use yii\db\Migration;

class m170910_194215_add_table_settings extends Migration {

    public function safeUp() {

        $this->createTable('{{%setting_group}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text(),
        ]);

        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'system' => $this->boolean()->defaultValue(TRUE),
            'key' => $this->string(30)->notNull()->unique(),
            'value' => $this->string(200)->notNull(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey('fk_setting_group_id', '{{%setting}}', 'group_id', '{{%setting_group}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown() {

        $this->dropTable('{{%setting}}');
        $this->dropTable('{{%setting_group}}');
    }

}
