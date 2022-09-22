<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "General_Ledger".
 */
class GeneralLedger extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_General_Ledger';
    }
}
