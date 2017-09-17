<?php

use yii\db\Migration;

class m130524_201442_init extends Migration {

    public function up() {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%resource}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
        ]);

        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'role' => $this->string(15)->unique(),
            'description' => $this->text(),
        ]);

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'display_name' => $this->string(40)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);


        //Add foreighn key to user table for role. 
        $this->addForeignKey('fk_user_role_id', '{{%user}}', 'role_id', '{{%role}}', 'id', 'CASCADE', 'RESTRICT');


        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'resource_id' => $this->integer()->notNull(),
            'role_id' => $this->integer()->notNull(),
            'view' => $this->boolean()->defaultValue(FALSE),
            'create' => $this->boolean()->defaultValue(FALSE),
            'update' => $this->boolean()->defaultValue(FALSE),
            'delete' => $this->boolean()->defaultValue(FALSE),
        ]);

        //foreign keys of permission table

        $this->addForeignKey('fk_permission_resource_id', '{{%permission}}', 'resource_id', '{{%resource}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_permission_role_id', '{{%permission}}', 'role_id', '{{%role}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down() {

        //order of droping constraints/tables matter here. so do not change
        $this->dropForeignKey('fk_permission_resource_id', 'permission');
        $this->dropForeignKey('fk_permission_role_id', 'permission');
        $this->dropTable('{{%permission}}');
        $this->dropTable('{{%resource}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%role}}');
        return TRUE;
    }

}
