<?php

use yii\db\Migration;

class m220125_054523_047_create_table_tax_charge extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%tax_charge}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'name' => $this->text(),
                'rate' => $this->decimal(4, 0),
                'type' => $this->string(140),
                'tax_included' => $this->boolean()->defaultValue('0'),
                'created_by' => $this->string(140),
                'updated_by' => $this->string(140),
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
        $this->dropTable('{{%tax_charge}}');
    }
}
