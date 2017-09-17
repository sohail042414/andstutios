<?php

use yii\db\Migration;

class m170722_201005_populate_applications_categories extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $user_id = 2;

        $this->insert('{{%category}}', [
            'title' => 'Games',
            'description' => 'Contains all games related categoried',
            'show_in_menu' => TRUE,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $category_id = $this->db->getLastInsertID();

        $this->insert('{{%application}}', [
            'package_id' => 'testingapplicasdfasfasdationasdfasdjflasjdfasdjfl',
            'title' => 'Sub way surfers',
            'short_description' => 'This is short description',
            'description' => 'This is very good game',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);

        $this->insert('{{%application}}', [
            'package_id' => 'testingapplicationasdfasdjflsdfasdfasjdfasdjfl',
            'title' => 'Candy Crush',
            'short_description' => 'This is short description',
            'description' => 'Here you crush candies',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);

        //new category
        $this->insert('{{%category}}', [
            'title' => 'Sports',
            'description' => 'Contains all sports apps that provide you sports info.',
            'show_in_menu' => TRUE,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $category_id = $this->db->getLastInsertID();

        $this->insert('{{%application}}', [
            'package_id' => 'testingapplicationasdfasdjflasjdfasdjfasdfasdfl',
            'title' => 'Ten Sports',
            'short_description' => 'This is short description',
            'description' => ' Here you watch ten sports live.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);



        $this->insert('{{%application}}', [
            'package_id' => 'testingapplicationasdfasdjflasjdfasdjfl',
            'title' => 'Espncricinfo',
            'short_description' => 'This is short description',
            'description' => ' Here you can check all live cricket matches around the globe.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);


        //new category
        $this->insert('{{%category}}', [
            'title' => 'Health',
            'description' => 'Contains all health related apps.',
            'show_in_menu' => TRUE,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);


        $this->insert('{{%application}}', [
            'package_id' => 'testingapplicationasdfas343djflasjdfasdjfl',
            'title' => 'Doctors online',
            'short_description' => 'This is short description',
            'description' => ' Many doctors available to discuss you problems here.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);


        $this->insert('{{%application}}', [
            'package_id' => 'testingapplicationasdfasdjflaasdfas222sjdfasdjfl',
            'title' => 'Fitnuss club ',
            'short_description' => 'This is short description',
            'description' => ' See each and everything related to fitness.',
            'playstore_url' => 'http://play.google.com',
            'user_id' => $user_id,
            'created_at' => 1493585108,
            'updated_at' => 1493585108,
        ]);

        $app_id = $this->db->getLastInsertID();

        $this->insert('{{%application_category}}', [
            'application_id' => $app_id,
            'category_id' => $category_id,
        ]);
    }

    public function safeDown() {
        $this->delete('{{%application_category}}');
        $this->delete('{{%application}}');
        $this->delete('{{%category}}');
    }

}
