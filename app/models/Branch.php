<?php

namespace app\models;

use app\models\base\BaseSetupMasterData;

/**
 * This is the model class for table "branch".
 *
 * @property Item[] $items
 */
class Branch extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'branch';
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
