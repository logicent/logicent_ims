<?php

use yii\db\Migration;

class m220125_054523_024_create_table_item_warehouse extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%item_warehouse}}',
            [
                'item_id' => $this->string(140)->notNull(),
                'warehouse_id' => $this->string(140)->notNull(),
                'inactive' => $this->integer(1)->defaultValue('0'),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'qty_in_stock' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_ordered' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_reserved' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_committed' => $this->decimal(10, 1)->defaultValue('0.0'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%item_warehouse}}', ['warehouse_id', 'item_id']);
    }

    public function down()
    {
        $this->dropTable('{{%item_warehouse}}');
    }
}
