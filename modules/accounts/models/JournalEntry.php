<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "journal_entry".
 */
class JournalEntry extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'journal_entry';
    }
}
