<?php

use yii\db\Migration;

class m220125_054523_022_create_table_item_group extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%item_group}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_by' => $this->string(140),
                'updated_by' => $this->string(20),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'inactive' => $this->boolean()->defaultValue('0'),
                'description' => $this->string(140),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%item_group}}');
    }
}
