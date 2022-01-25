<?php

use yii\db\Migration;

class m220125_054523_009_create_table_customer extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%customer}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'name' => $this->string(140)->notNull(),
                'inactive' => $this->boolean()->defaultValue('0'),
                'salutation' => $this->string(5),
                'lead_name' => $this->string(140),
                'phone_number' => $this->string(140),
                'email_address' => $this->string(140),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'customer_details' => $this->text(),
                'default_currency' => $this->char(3),
                'default_price_list' => $this->string(140),
                'credit_days' => $this->integer(),
                'credit_days_based_on' => $this->string(140),
                'credit_limit' => $this->decimal(12, 4)->defaultValue('0.0000'),
                'tax_Id' => $this->string(140),
                'customer_group' => $this->string(140),
                'customer_type' => $this->string(140)->defaultValue('Individual'),
                'customer_pos_Id' => $this->string(140),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('customer_group', '{{%customer}}', ['customer_group']);
    }

    public function down()
    {
        $this->dropTable('{{%customer}}');
    }
}
