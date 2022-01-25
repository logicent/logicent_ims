<?php

use yii\db\Migration;

class m220125_054523_040_create_table_sales_person extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sales_person}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'inactive' => $this->integer(1)->defaultValue('0'),
                'employee_name' => $this->string(140),
                'comments' => $this->text(),
                'tags' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%sales_person}}');
    }
}
