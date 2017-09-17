<?php

use yii\db\Migration;

class m170722_203012_create_table_image_size extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $this->createTable('{{%image_size}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'system' => $this->boolean()->defaultValue(FALSE),
            'type' => $this->string(20)->defaultValue('normal')->notNull()->unique(),
            'width' => $this->integer()->notNull()->defaultValue(256),
            'height' => $this->integer()->notNull()->defaultValue(256),
        ]);

        $this->insert('{{%image_size}}', [
            'description' => 'This is normal image used on home page etc',
            'system' => TRUE,
            'type' => 'normal',
            'width' => 512,
            'height' => 512,
        ]);


        $this->insert('{{%image_size}}', [
            'description' => 'This is display image, used on applicatio detail page',
            'system' => TRUE,
            'type' => 'display',
            'width' => 1024,
            'height' => 512
        ]);

        $this->insert('{{%image_size}}', [
            'description' => 'This is Back add',
            'type' => 'BackAd',
            'system' => TRUE,
            'width' => 256,
            'height' => 256
        ]);

        $this->insert('{{%image_size}}', [
            'description' => 'This is Main add ',
            'type' => 'MainAd',
            'system' => TRUE,
            'width' => 512,
            'height' => 100,
        ]);

        $this->insert('{{%image_size}}', [
            'description' => 'This is Banner Add ',
            'type' => 'BannerAd',
            'system' => TRUE,
            'width' => 100,
            'height' => 512
        ]);
    }

    public function safeDown() {
        $this->dropTable('{{%image_size}}');
    }

}
