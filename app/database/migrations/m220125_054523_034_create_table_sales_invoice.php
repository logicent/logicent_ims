<?php

use yii\db\Migration;

class m220125_054523_034_create_table_sales_invoice extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sales_invoice}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'customer_id' => $this->string(140)->notNull(),
                'customer_name' => $this->string(140),
                'tax_id' => $this->string(140),
                'issued_at' => $this->dateTime()->notNull(),
                'due_date' => $this->date()->notNull(),
                'update_stock' => $this->boolean(),
                'is_pos' => $this->boolean(),
                'is_internal_customer' => $this->boolean(),
                'pos_profile_id' => $this->string(140),
                'sales_person_id' => $this->string(140),
                'is_return' => $this->boolean(),
                'is_discounted' => $this->boolean(),
                'amended_from' => $this->string(140),
                'return_against' => $this->string(140),
                'branch_id' => $this->string(140),
                'po_reference' => $this->string(140),
                'po_date' => $this->date(),
                'order_type' => $this->string(140),
                'title' => $this->string(140),
                'billing_address' => $this->string(140),
                'currency' => $this->char(3),
                'price_list_id' => $this->string(140),
                'authorized_by' => $this->string(140),
                'status' => $this->string(140),
                'terms' => $this->text(),
                'notes' => $this->text(),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'paid_status' => $this->string(140),
                'total_quantity' => $this->integer(10),
                'discount_amount' => $this->decimal(12, 4),
                'discount_percent' => $this->decimal(6, 2),
                'balance_amount' => $this->decimal(12, 4),
                'deposit_amount' => $this->decimal(12, 4),
                'paid_amount' => $this->decimal(12, 4),
                'change_amount' => $this->decimal(12, 4),
                'net_total' => $this->decimal(12, 4),
                'total_amount' => $this->decimal(12, 4),
                'total_in_words' => $this->string(140),
                'tax_amount' => $this->decimal(12, 4),
                'tax_percent' => $this->decimal(6, 2),
                'amounts_tax_inclusive' => $this->boolean(),
                'rounding_adjustment' => $this->decimal(12, 4),
                'rounded_total' => $this->decimal(12, 4),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('customer_id', '{{%sales_invoice}}', ['customer_id']);
    }

    public function down()
    {
        $this->dropTable('{{%sales_invoice}}');
    }
}
