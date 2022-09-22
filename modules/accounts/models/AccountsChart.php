<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "Account_Chart".
 *
 * @property GeneralLedger[] $accounts
 */
class AccountChart extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Account_Chart';
    }

    public function getGeneralLedger()
    {
        return $this->hasMany(GeneralLedger::class, ['account_chart' => 'id']);
    }
}
