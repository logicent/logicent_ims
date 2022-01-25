<?php

use yii\db\Migration;

class m220125_054523_023_create_table_item_uom extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%item_uom}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'must_be_whole_number' => $this->integer(1)->defaultValue('0'),
                'inactive' => $this->integer(1)->defaultValue('0'),
                'comments' => $this->text(),
                'tags' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%item_uom}}');
    }
}
