<?php

use yii\db\Migration;

class m220125_054523_010_create_table_customer_group extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%customer_group}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'inactive' => $this->integer(1)->defaultValue('0'),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'credit_limit' => $this->decimal(12, 4)->defaultValue('0.0000'),
                'credit_days_based_on' => $this->integer(),
                'default_price_list' => $this->integer(),
                'credit_days' => $this->integer(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%customer_group}}');
    }
}
