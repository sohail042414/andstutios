<?php

use yii\db\Migration;

class m170722_200900_create_table_category extends Migration {

    public function safeUp() {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer()->defaultValue(0),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'show_in_menu' => $this->boolean()->defaultValue(FALSE),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown() {
        $this->dropTable('{{%category}}');
    }

}
