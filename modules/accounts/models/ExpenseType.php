<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "expense_type".
 *
 * @property Expense[] $expenses
 */
class ExpenseType extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'expense_type';
    }

    public function getExpenses()
    {
        return $this->hasMany(Expense::class, ['type' => 'id']);
    }
}
