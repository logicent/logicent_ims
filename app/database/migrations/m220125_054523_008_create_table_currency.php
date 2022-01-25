<?php

use yii\db\Migration;

class m220125_054523_008_create_table_currency extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%currency}}',
            [
                'id' => $this->primaryKey(10)->unsigned(),
                'name' => $this->string(191)->notNull(),
                'code' => $this->string(191)->notNull(),
                'rate' => $this->double()->notNull(),
                'precision' => $this->string(191),
                'symbol' => $this->string(191),
                'symbol_first' => $this->integer()->notNull()->defaultValue('1'),
                'decimal_mark' => $this->string(191),
                'thousands_separator' => $this->string(191),
                'enabled' => $this->tinyInteger(4)->notNull()->defaultValue('1'),
                'created_by' => $this->string(140),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('thk_currencies_company_id_code_deleted_at_unique', '{{%currency}}', ['code', 'deleted_at'], true);
    }

    public function down()
    {
        $this->dropTable('{{%currency}}');
    }
}
