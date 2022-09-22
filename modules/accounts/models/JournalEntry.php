<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTransactionDocument;

/**
 * This is the model class for table "Journal_Entry".
 */
class JournalEntry extends BaseTransactionDocument
{
    public static function tableName()
    {
        return 'lgct_Journal_Entry';
    }
}
