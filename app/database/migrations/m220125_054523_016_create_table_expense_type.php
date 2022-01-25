<?php

use yii\db\Migration;

class m220125_054523_016_create_table_expense_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%expense_type}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'description' => $this->text(),
                'inactive' => $this->boolean(),
                'account_id' => $this->string(140),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'created_by' => $this->string(140),
                'updated_by' => $this->string(140),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%expense_type}}');
    }
}
