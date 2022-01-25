<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "expense_type".
 *
 * @property Expense[] $expenses
 */
class ExpenseType extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'expense_type';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 140],
            [['inactive'], 'boolean'],
            [['description'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'inactive' => Yii::t('app', 'Inactive'),
        ]);
    }

    public function getExpenses()
    {
        return $this->hasMany(Expense::class, ['type' => 'id']);
    }

    public static function enums()
    {
        return [
            'inactive' => Status_Active::class
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
