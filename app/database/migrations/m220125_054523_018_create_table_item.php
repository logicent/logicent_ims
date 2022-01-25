<?php

use yii\db\Migration;

class m220125_054523_018_create_table_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%item}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'name' => $this->string(140)->notNull(),
                'status' => $this->integer(1)->notNull()->defaultValue('0'),
                'barcode' => $this->string(140),
                'tags' => $this->text(),
                'comments' => $this->text(),
                'created_by' => $this->string(140),
                'updated_by' => $this->string(140),
                'default_supplier' => $this->string(140),
                'net_weight' => $this->decimal(10, 2)->defaultValue('0.00'),
                'max_discount' => $this->decimal(4, 2)->defaultValue('0.00'),
                'expense_account' => $this->string(140),
                'income_account' => $this->string(140),
                'item_group' => $this->string(140),
                'item_type' => $this->string(140),
                'has_variants' => $this->boolean(),
                'description' => $this->text(),
                'default_warehouse' => $this->string(140),
                'is_sales_item' => $this->boolean()->defaultValue('1'),
                'is_stock_item' => $this->boolean()->defaultValue('1'),
                'min_order_qty' => $this->decimal(10, 1)->defaultValue('1.0'),
                'image_path' => $this->text(),
                'last_purchase_rate' => $this->decimal(12, 4)->defaultValue('0.0000'),
                'is_purchase_item' => $this->boolean()->defaultValue('1'),
                'weight_uom' => $this->string(140),
                'inactive' => $this->boolean(),
                'brand_id' => $this->string(140),
                'item_uom' => $this->string(140),
                'sales_uom' => $this->string(140),
                'purchase_uom' => $this->string(140),
                'opening_stock' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_ordered' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_in_stock' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_reserved' => $this->decimal(10, 1)->defaultValue('0.0'),
                'qty_committed' => $this->decimal(10, 1),
                'standard_rate' => $this->decimal(12, 4)->defaultValue('0.0000'),
                'tax_account_id' => $this->string(140),
                'tax_code' => $this->string(140),
                'tax_rate' => $this->decimal(4, 1)->defaultValue('0.0'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('item_group', '{{%item}}', ['item_group']);
    }

    public function down()
    {
        $this->dropTable('{{%item}}');
    }
}
