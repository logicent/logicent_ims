<?php

use yii\db\Migration;

class m220125_054523_041_create_table_sales_quote extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sales_quote}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'issued_at' => $this->dateTime()->notNull(),
                'valid_till' => $this->date(),
                'customer_id' => $this->string(140)->notNull(),
                'customer_name' => $this->string(140)->notNull(),
                'order_type' => $this->string(140),
                'currency' => $this->char(3),
                'price_list_id' => $this->string(140),
                'authorized_by' => $this->string(140),
                'status' => $this->string(140),
                'terms' => $this->text(),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'total_quantity' => $this->integer(10),
                'discount_amount' => $this->decimal(12, 4),
                'discount_percent' => $this->decimal(6, 2),
                'net_total' => $this->decimal(12, 4),
                'total_amount' => $this->decimal(12, 4),
                'tax_amount' => $this->decimal(12, 4),
                'tax_percent' => $this->decimal(6, 2),
                'amounts_tax_inclusive' => $this->boolean(),
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

        $this->createIndex('customer_id', '{{%sales_quote}}', ['customer_id']);
    }

    public function down()
    {
        $this->dropTable('{{%sales_quote}}');
    }
}
