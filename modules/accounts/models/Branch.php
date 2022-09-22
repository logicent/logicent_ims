<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "Branch".
 *
 * @property Item[] $items
 */
class Branch extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Branch';
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
