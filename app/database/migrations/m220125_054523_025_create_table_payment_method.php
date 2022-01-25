<?php

use yii\db\Migration;

class m220125_054523_025_create_table_payment_method extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%payment_method}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'description' => $this->string(140),
                'inactive' => $this->tinyInteger(4),
                'is_default' => $this->tinyInteger(4),
                'account_id' => $this->string(140),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('account_id', '{{%payment_method}}', ['account_id']);
    }

    public function down()
    {
        $this->dropTable('{{%payment_method}}');
    }
}
