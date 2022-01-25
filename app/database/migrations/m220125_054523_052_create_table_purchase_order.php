<?php

use yii\db\Migration;

class m220125_054523_052_create_table_purchase_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%purchase_order}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'supplier_id' => $this->string(140)->notNull(),
                'supplier_name' => $this->string(140),
                'tax_id' => $this->string(140),
                'issued_at' => $this->dateTime()->notNull(),
                'pr_reference' => $this->string(140),
                'pr_date' => $this->date(),
                'balance_amount' => $this->decimal(12, 4),
                'deposit_amount' => $this->decimal(12, 4),
                'net_total' => $this->decimal(12, 4),
                'total_amount' => $this->decimal(12, 4),
                'total_in_words' => $this->string(140),
                'tax_amount' => $this->decimal(12, 4),
                'tax_percent' => $this->decimal(6, 2),
                'amounts_tax_inclusive' => $this->boolean(),
                'paid_amount' => $this->decimal(12, 4),
                'order_type' => $this->string(140),
                'billing_address' => $this->string(140),
                'currency' => $this->char(3),
                'price_list_id' => $this->string(140),
                'authorized_by' => $this->string(140),
                'status' => $this->string(140),
                'is_internal_supplier' => $this->boolean(),
                'is_discounted' => $this->boolean(),
                'amended_from' => $this->string(140),
                'return_against' => $this->string(140),
                'terms' => $this->text(),
                'notes' => $this->text(),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'paid_status' => $this->string(140),
                'total_quantity' => $this->integer(10),
                'rounding_adjustment' => $this->decimal(12, 4),
                'rounded_total' => $this->decimal(12, 4),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(20),
                'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_by' => $this->string(20),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('customer_id', '{{%purchase_order}}', ['supplier_id']);

        $this->addForeignKey(
            'purchase_order_ibfk_1',
            '{{%purchase_order}}',
            ['supplier_id'],
            '{{%supplier}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropTable('{{%purchase_order}}');
    }
}
