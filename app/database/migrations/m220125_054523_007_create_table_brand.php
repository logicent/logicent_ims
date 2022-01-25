<?php

use yii\db\Migration;

class m220125_054523_007_create_table_brand extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%brand}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'description' => $this->text(),
                'default_warehouse' => $this->string(140),
                'default_price_list' => $this->string(140),
                'default_supplier' => $this->string(140),
                'image_path' => $this->string(140),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'inactive' => $this->integer(1)->defaultValue('0'),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%brand}}');
    }
}
