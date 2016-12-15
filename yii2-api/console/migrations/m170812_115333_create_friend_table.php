<?php

use yii\db\Schema;
use yii\db\Migration;

class m170812_115333_create_friend_table extends Migration
{
    public function up()
    {
        $this->createTable('friend', [
            'code' => Schema::TYPE_STRING . ' NOT NULL',
            'friend' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_INTEGER . ' NOT NULL',
            'info' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addPrimaryKey('pk_code', 'friend', 'code');
    }

    public function down()
    {
        $this->dropTable('friend');

        return false;
    }
}