<?php

use yii\db\Schema;
use yii\db\Migration;

class m150504_131208_group extends Migration
{
    public function safeUp()
    {
        $this->createTable('group' , [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'logo' => Schema::TYPE_STRING,
        ]);

        $this->insert('group', [
            'title' => 'Группа Кино',
            'description' => 'Рок группа Кино!',
            'logo' => 'Адресс картинки'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('group');
    }
}
