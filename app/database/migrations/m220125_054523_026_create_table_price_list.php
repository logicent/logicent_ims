<?php

use yii\db\Migration;

class m220125_054523_026_create_table_price_list extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%price_list}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'status' => $this->binary(),
                'inactive' => $this->boolean()->defaultValue('0'),
                'currency' => $this->char(3),
                'module' => $this->string(140)->notNull(),
                'comments' => $this->text(),
                'tags' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%price_list}}');
    }
}
