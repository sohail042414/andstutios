<?php

use yii\db\Migration;

class m170124_134745_populate_rbac extends Migration {

    public function safeUp() {

        //Insert roles
        $this->insertRoles();

        //Insert Users
        $this->insertUsers();

        //Insert Resources 
        $this->insertResources();

        //Insert Permissions
        $this->insertPermissions();
    }

    private function insertRoles() {

        $this->insert('{{%role}}', [
            'role' => 'developer',
            'description' => 'Developer of application , can have debugging features on'
        ]);

        $this->insert('{{%role}}', [
            'role' => 'owner',
            'description' => 'Owner of application, will have all options, delete , update , etc'
        ]);

        $this->insert('{{%role}}', [
            'role' => 'admin',
            'description' => 'This is similar to content manage, can add,view date, Owner will view and finalize. '
        ]);
    }

    public function insertUsers() {

        //password : developer123
        $this->insert('{{%user}}', [
            'role_id' => 1,
            'username' => 'developer',
            'display_name' => 'Developer Khan',
            'auth_key' => 'sMCCWHi28a9KvjSaA04qFXoWWgo46lwP',
            'password_hash' => '$2y$13$bjc5x/Nclng/uGazUbzfheXCQFByBR2XdtL6bDBJ0ZohVPlY4KOKW',
            'password_reset_token' => NULL,
            'email' => 'developer@appstore.com',
            'status' => 10,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        //password : owner123

        $this->insert('{{%user}}', [
            'role_id' => 2,
            'username' => 'owner',
            'display_name' => 'Owner Khan',
            'auth_key' => 'uFV5Q9qJohDWYncoQHFrxseHXtKi_NAw',
            'password_hash' => '$2y$13$ORxopAX0uvH.BWsL37uwu.AEawObqeB9NPNRlwl6dwMz10ELEjD0e',
            'password_reset_token' => NULL,
            'email' => 'owner@appstore.com',
            'status' => 10,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        //password : admin123
        $this->insert('{{%user}}', [
            'role_id' => 1,
            'username' => 'admin',
            'display_name' => 'Administrator',
            'auth_key' => 'pLz_H-CirXjZA06wMvstc6xXTgUyeFWQ',
            'password_hash' => '$2y$13$mWXFFmssulCjeXPaImUy3.HrkFinZlnfQ7cFBn/2YjxpyQxL1AlPK',
            'password_reset_token' => NULL,
            'email' => 'admin@appstore.com',
            'status' => 10,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);
    }

    private function insertResources() {

        // will be added later
    }

    private function insertPermissions() {
        /*
          //Insert few permissions for user

          $this->insert('{{%permission}}', [
          'role_id' => '1',
          'resource_id' => '1100',
          'view' => TRUE,
          ]);

          $this->insert('{{%permission}}', [
          'role' => 'user',
          'resource_id' => '1101',
          'view' => TRUE,
          ]);

          //Insert few permissions for admin

          $this->insert('{{%permission}}', [
          'role' => 'admin',
          'resource_id' => '1100',
          'view' => TRUE,
          'create' => TRUE,
          ]);

          $this->insert('{{%permission}}', [
          'role' => 'admin',
          'resource_id' => '1101',
          'view' => TRUE,
          'create' => TRUE,
          ]);
         * 
         */
    }

    public function down() {

        $this->delete('{{%permission}}');
        $this->delete('{{%resource}}');
        $this->delete('{{%role}}');
        return TRUE;
    }

}
