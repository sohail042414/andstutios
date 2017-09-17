<?php

use yii\db\Migration;

class m170910_195153_populate_settings extends Migration {

    public function up() {

        $this->insert('{{%setting_group}}', [
            'title' => 'Adds',
            'description' => 'Contains all Adds related settings',
        ]);

        $group_id = $this->db->getLastInsertID();


        $this->insert('{{%setting}}', [
            'group_id' => $group_id,
            'title' => 'Add file Version',
            'key' => 'adds_version',
            'value' => '6',
            'description' => 'This is used in adds file',
        ]);


        $this->insert('{{%setting}}', [
            'group_id' => $group_id,
            'title' => 'Add file Version',
            'key' => 'adds_file',
            'value' => '@frontend/web/AndAds/CustomAdsFile.json',
            'description' => 'This is full path of adds file with file name',
        ]);


        $this->insert('{{%setting}}', [
            'group_id' => $group_id,
            'title' => 'Add file Version',
            'key' => 'adds_path',
            'value' => '@frontend/web/AndAds/',
            'description' => 'This is path of adds file, it does not include name',
        ]);

        $this->insert('{{%setting}}', [
            'group_id' => $group_id,
            'title' => 'Images base url ',
            'key' => 'images_base_url',
            'value' => 'http://andstutios.local/images/',
            'description' => 'url upto to directory name.  must have / at the end',
        ]);

        $this->insert('{{%setting}}', [
            'group_id' => $group_id,
            'title' => 'Images upload directory ',
            'key' => 'images_upload_path',
            'value' => 'http://andstutios.local/images/',
            'description' => ' Where images are uploaded',
        ]);
    }

    public function down() {

        $this->delete('{{%setting}}');
        $this->delete('{{%setting_group}}');
    }

}
