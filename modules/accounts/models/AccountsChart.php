<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "account_chart".
 *
 * @property GeneralLedger[] $accounts
 */
class AccountChart extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'account_chart';
    }

    public function getGeneralLedger()
    {
        return $this->hasMany(GeneralLedger::class, ['account_chart' => 'id']);
    }
}
