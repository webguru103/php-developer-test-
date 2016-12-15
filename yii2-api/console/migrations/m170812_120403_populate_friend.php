<?php

use yii\db\Schema;
use yii\db\Migration;

class m170812_120403_populate_friend extends Migration
{
    public function up()
    {
        $this->execute("
            INSERT INTO `Friend` VALUES ('AU','Anton Uro',18886000, 'I am experienced web developer!');
            INSERT INTO `Friend` VALUES ('BR','Black Ryan',170115000, 'I am experienced web developer!');
            INSERT INTO `Friend` VALUES ('CA','Can Andrew',1147000, 'I am experienced web developer!');
            INSERT INTO `Friend` VALUES ('CN','Connan Nelson',1277558000, 'I am experienced web developer!');
            INSERT INTO `Friend` VALUES ('DE','Demon Evra',82164700, 'I am experienced web developer!');
        ");
    }

    public function down()
    {
        $this->execute('DELETE FROM Friend');

        return false;
    }
}