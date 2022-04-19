<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "account_group".
 *
 * @property GeneralLedger[] $accounts
 */
class AccountGroup extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'account_group';
    }

    public function getGeneralLedger()
    {
        return $this->hasMany(GeneralLedger::class, ['account_group' => 'id']);
    }
}
