<?php

use yii\db\Migration;

class m220125_054523_044_create_table_stock_entry extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%stock_entry}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'status' => $this->string(140),
                'source_type' => $this->string(140),
                'source_id' => $this->string(140),
                'party' => $this->string(140),
                'party_id' => $this->string(140),
                'amended_from' => $this->string(140),
                'from_warehouse' => $this->string(140),
                'to_warehouse' => $this->string(140),
                'title' => $this->string(140),
                'remarks' => $this->text(),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'total_amount' => $this->decimal(12, 4),
                'total_quantity' => $this->decimal(12, 4),
            ],
            $tableOptions
        );

        $this->createIndex('delivery_note_no', '{{%stock_entry}}', ['source_id']);
    }

    public function down()
    {
        $this->dropTable('{{%stock_entry}}');
    }
}
