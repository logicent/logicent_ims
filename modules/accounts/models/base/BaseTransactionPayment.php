<?php

namespace logicent\accounts\models\base;

use app\modules\main\models\base\BaseActiveRecordDetail;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;

/**
 * This is the base model class for "_payment".
 */
class BaseTransactionPayment extends BaseActiveRecordDetail implements PostingInterface
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'item_name'; // override in view index
        $this->listSettings->listIdAttribute = 'order_no'; // override in view index
    }

    public function rules()
    {
        return [
            [['paid_at', 'paid_amount'], 'required'],
            [['paid_amount'], 'number'],
            [['status', 'payment_method', 'narration', 'account_id'], 'string', 'max' => 140],
            [['paid_at'], 'datetime', 'format' => 'php:Y-m-d H:i:s']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'paid_at' => Yii::t('app', 'Paid at'),
            'paid_amount' => Yii::t('app', 'Paid amount'),
            'payment_method' => Yii::t('app', 'Payment method'),
            'status' => Yii::t('app', 'Status'),
            'narration' => Yii::t('app', 'Narration'),
        ];
    }

    // PostingInterface
    public function hasInventoryImpact()
    {
        return false;
    }

    public function updateInventory()
    {
    }

    public function hasAccountingImpact()
    {
        return $this->document->hasAccountingImpact();
    }

    public function updateAccounting()
    {
        // check party account and adjust accordingly if applicable
    }

    // skip records with paid_amount == 0
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
            return false;

        if ($this->paid_amount == 0)
            return false;

        return true;
    }
}
