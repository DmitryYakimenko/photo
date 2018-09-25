<?php

use yii\db\Migration;

class m180925_105206_create_table_photo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%photo}}', [
            'id_photo' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'dir' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('name', '{{%photo}}', 'name', true);
    }

    public function down()
    {
        $this->dropTable('{{%photo}}');
    }
}
