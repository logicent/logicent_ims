<?php

namespace logicent\accounts\models;

use app\modules\main\models\base\AutoincrementIdInterface;
use app\modules\main\models\base\BaseActiveRecord;
use app\modules\setup\enums\Status_Transaction;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "expense".
 *
 * @property ExpenseType[] $expenseType
 */
class Expense extends BaseActiveRecord implements AutoincrementIdInterface
{
    // Petty Cash Vouchers
    const DOC_NUM_PREFIX = 'EXP-';

    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public static function tableName()
    {
        return 'expense';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['date', 'payee', 'payment_method', 'amount'], 'required'],
            ['status', 'default', 'value' => Status_Transaction::Draft],
            [['id', 'reference', 'type', 'payee', 'payment_method', 'currency'], 'string', 'max' => 140],
            [['amount'], 'number'],
            [['narration'], 'string', 'max' => 280],
            [['date'], 'date', 'format' => 'php:Y-m-d']
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'Name'),
            'reference' => Yii::t('app', 'Reference'),
            'type' => Yii::t('app', 'Type'),
            'date' => Yii::t('app', 'Date'),
            'payee' => Yii::t('app', 'Payee'),
            'payment_method' => Yii::t('app', 'Payment method'),
            'currency' => Yii::t('app', 'Currency'),
            'amount' => Yii::t('app', 'Amount'),
            'narration' => Yii::t('app', 'Narration'),
        ], $attributeLabels);
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }

    public function hasWorkflow()
    {
        return true;
    }

    public function getExpenseType()
    {
        return $this->hasMany(ExpenseType::class, ['id' => 'type']);
    }

    // AutoincrementIdInterface
    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }

    public function docNumPreset()
    {
        return $this->docNumPrefix() . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
            return false;
        // else
        if ($this->isNewRecord)
            $this->id = $this->docNumPreset();

        return true;
    }
}
