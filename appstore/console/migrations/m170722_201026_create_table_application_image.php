<?php

use yii\db\Migration;

class m170722_201026_create_table_application_image extends Migration {

    public function safeUp() {


        $this->createTable('{{%application_image}}', [
            'id' => $this->primaryKey(),
            'application_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'type' => $this->string(20)->defaultValue('normal')->notNull(),
        ]);

        $this->addForeignKey('fk_application_image_application_id', '{{%application_image}}', 'application_id', '{{%application}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown() {

        $this->dropForeignKey('fk_application_image_application_id', 'application_image');
        $this->dropTable('{{%application_image}}');

        return TRUE;
    }

}
