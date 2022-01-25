<?php

use yii\db\Migration;

class m220125_054523_028_create_table_purchase_invoice_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%purchase_invoice_item}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'purchase_invoice_id' => $this->string(140)->notNull(),
                'item_id' => $this->string(140)->notNull(),
                'barcode' => $this->string(140)->notNull(),
                'item_name' => $this->string(140),
                'item_status' => $this->string(140),
                'description' => $this->text(),
                'quantity' => $this->decimal(12, 4)->unsigned(),
                'item_uom' => $this->string(140),
                'item_group' => $this->string(140),
                'brand' => $this->string(140),
                'unit_price' => $this->decimal(12, 4)->unsigned(),
                'discount_amount' => $this->decimal(12, 4)->unsigned(),
                'discount_percent' => $this->decimal(4, 2)->unsigned(),
                'is_free_item' => $this->boolean()->unsigned(),
                'net_amount' => $this->decimal(12, 4)->unsigned(),
                'tax_amount' => $this->decimal(12, 4)->unsigned(),
                'tax_percent' => $this->decimal(4, 2)->unsigned(),
                'total_amount' => $this->decimal(12, 4)->unsigned(),
                'gross_profit' => $this->decimal(12, 4)->unsigned(),
                'account_id' => $this->string(140),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('item_id', '{{%purchase_invoice_item}}', ['item_id']);
        $this->createIndex('sales_quote_id', '{{%purchase_invoice_item}}', ['purchase_invoice_id']);
        $this->createIndex('account_id', '{{%purchase_invoice_item}}', ['account_id']);
    }

    public function down()
    {
        $this->dropTable('{{%purchase_invoice_item}}');
    }
}
