<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "Account_Group".
 *
 * @property GeneralLedger[] $accounts
 */
class AccountGroup extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Account_Group';
    }

    public function getGeneralLedger()
    {
        return $this->hasMany(GeneralLedger::class, ['account_group' => 'id']);
    }
}
