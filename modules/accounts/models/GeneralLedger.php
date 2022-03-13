<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "general_ledger".
 */
class GeneralLedger extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'general_ledger';
    }
}
