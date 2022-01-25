<?php

use yii\db\Migration;

class m220125_054523_015_create_table_expense extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%expense}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'reference' => $this->string(140),
                'type' => $this->string(140),
                'status' => $this->string(140),
                'date' => $this->date()->notNull(),
                'payee' => $this->string(140),
                'payment_method' => $this->string(140),
                'currency' => $this->char(3),
                'amount' => $this->decimal(10, 2),
                'narration' => $this->string(280),
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
        $this->dropTable('{{%expense}}');
    }
}
