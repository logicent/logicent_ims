<?php

use yii\db\Migration;

class m220125_054523_045_create_table_stock_entry_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%stock_entry_item}}',
            [
                'id' => $this->primaryKey(10),
                'stock_entry_id' => $this->string(140),
                'from_warehouse' => $this->string(140),
                'to_warehouse' => $this->string(140),
                'barcode' => $this->string(140),
                'item_id' => $this->string(140),
                'item_name' => $this->string(140),
                'uom' => $this->string(140),
                'quantity' => $this->decimal(12, 4)->defaultValue('0.0000'),
                'item_rate' => $this->decimal(12, 4)->defaultValue('0.0000'),
                'item_total' => $this->decimal(12, 4),
                'serial_no' => $this->text(),
                'batch_no' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('actual_qty', '{{%stock_entry_item}}', ['quantity']);
        $this->createIndex('item_code', '{{%stock_entry_item}}', ['barcode']);
    }

    public function down()
    {
        $this->dropTable('{{%stock_entry_item}}');
    }
}
