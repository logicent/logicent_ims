<?php

use yii\db\Migration;

class m220125_054523_031_create_table_purchase_order_payment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%purchase_order_payment}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'purchase_order_id' => $this->string(140)->notNull(),
                'paid_at' => $this->dateTime(),
                'paid_amount' => $this->decimal(12, 4),
                'payment_method' => $this->string(140),
                'status' => $this->string(140),
                'narration' => $this->text(),
                'account_id' => $this->string(140),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('account_id', '{{%purchase_order_payment}}', ['account_id']);
        $this->createIndex('sales_quote_id', '{{%purchase_order_payment}}', ['purchase_order_id']);
    }

    public function down()
    {
        $this->dropTable('{{%purchase_order_payment}}');
    }
}