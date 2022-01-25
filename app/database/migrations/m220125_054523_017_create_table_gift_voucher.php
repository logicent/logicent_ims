<?php

use yii\db\Migration;

class m220125_054523_017_create_table_gift_voucher extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%gift_voucher}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'description' => $this->string(280),
                'type' => $this->string(140),
                'valid_from' => $this->date(),
                'valid_to' => $this->date(),
                'value' => $this->decimal(10, 2),
                'is_redeemed' => $this->boolean(),
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
        $this->dropTable('{{%gift_voucher}}');
    }
}
