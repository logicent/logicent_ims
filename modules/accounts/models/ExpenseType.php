<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "Expense_Type".
 *
 * @property Expense[] $expenses
 */
class ExpenseType extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Expense_Type';
    }

    public function getExpenses()
    {
        return $this->hasMany(Expense::class, ['type' => 'id']);
    }
}
