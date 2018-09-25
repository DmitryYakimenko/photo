<?php

use yii\db\Migration;

class m180925_105206_create_table_Project_Photo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%Project_Photo}}', [
            'id_project_photo' => $this->primaryKey(),
            'id_project' => $this->integer()->notNull(),
            'id_photo' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_photo', '{{%Project_Photo}}', 'id_photo');
        $this->createIndex('id_project', '{{%Project_Photo}}', 'id_project');
        $this->addForeignKey('project_photo_ibfk_1', '{{%Project_Photo}}', 'id_project', '{{%project}}', 'id_project', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('project_photo_ibfk_2', '{{%Project_Photo}}', 'id_photo', '{{%photo}}', 'id_photo', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%Project_Photo}}');
    }
}
