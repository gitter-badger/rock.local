<?php

use yii\db\Schema;
use yii\db\Migration;

class m150504_141906_artist extends Migration
{
    public function up()
    {
        $this->createTable('artist' , [
            'id' => 'pk',
            'full_name' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'logo' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('artist');
    }
}
