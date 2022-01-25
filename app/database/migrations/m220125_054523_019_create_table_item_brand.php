<?php

use yii\db\Migration;

class m220125_054523_019_create_table_item_brand extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%item_brand}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'inactive' => $this->integer(1)->defaultValue('0'),
                'comments' => $this->text(),
                'item_id' => $this->string(140)->notNull(),
                'brand_id' => $this->string(140)->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%item_brand}}');
    }
}
