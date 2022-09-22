<?php

namespace crudle\ext\hr\models;

use Yii;

/**
 * This is the model class for table "expense_claim".
 *
 * @property integer $id
 * @property string $reference
 * @property integer $date
 * @property integer $payer_id
 * @property string $payee
 * @property string $description
 * @property double $amount
 * @property string $created_at
 * @property string $updated_at
 */
class ExpenseClaim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lgct_Expense_Claim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'payer_id', 'payee', 'description', 'amount'], 'required'],
            [['date', 'payer_id'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['reference'], 'string', 'max' => 10],
            [['payee'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reference' => Yii::t('app', 'Reference'),
            'date' => Yii::t('app', 'Date'),
            'payer_id' => Yii::t('app', 'Payer ID'),
            'payee' => Yii::t('app', 'Payee'),
            'description' => Yii::t('app', 'Description'),
            'amount' => Yii::t('app', 'Amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
