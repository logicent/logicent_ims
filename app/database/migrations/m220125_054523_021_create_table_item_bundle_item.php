<?php

use yii\db\Migration;

class m220125_054523_021_create_table_item_bundle_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%item_bundle_item}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'item_id' => $this->string(140),
                'bundle_id' => $this->string(140),
                'quantity' => $this->decimal(12, 4),
                'uom' => $this->string(140),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%item_bundle_item}}');
    }
}
