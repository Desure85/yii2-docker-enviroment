<?php

use yii\db\Migration;

class m170402_185017_files extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%files}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'file_name' => $this->text()->notNull(),
            'file_path' => $this->text()->notNull(),
        ],$tableOptions);
        $this->createIndex('ix_id', '{{%files}}', 'id');
        $this->createIndex('ix_user_id', '{{%files}}', 'user_id');


    }

    public function safeDown()
    {
       return  $this->dropTable('{{%files}}');
    }
}
