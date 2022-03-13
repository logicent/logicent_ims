<?php

namespace logicent\stock\models;

use app\enums\Status_Transaction;
use app\enums\Type_Module;
use app\enums\Type_Permission;
use app\enums\Type_Relation;
use app\models\base\AutoincrementIdInterface;
use app\models\base\BaseActiveRecord;
use logicent\accounts\models\base\PostingInterface;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "stock_entry".
 */
class StockEntry extends BaseActiveRecord implements PostingInterface, AutoincrementIdInterface
{
    // (Item Movement)
    const DOC_NUM_PREFIX = 'STE-';

    public $party_name;

    public function init()
    {
        // parent::init();
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
        $this->listSettings->listIdAttribute = 'id'; // override in view index
    }

    public static function moduleType()
    {
        return Type_Module::Stock;
    }

    public static function tableName()
    {
        return 'stock_entry';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['to_warehouse', 'issued_at', 'type'], 'required'],
            [['from_warehouse', 'remarks'], 'string'],
            [['is_opening'], 'boolean'],
            [['total_amount', 'total_quantity'], 'number'],
            [['amended_from', 'party', 'party_id', 'source_type',
                'source_id', 'title'], 'string', 'max' => 140],
            [['issued_at'], 'datetime', 'format' => 'php:Y-m-d H:i:s'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'issued_at' => Yii::t('app', 'Issued at'),
            'from_warehouse' => Yii::t('app', 'From warehouse'),
            'to_warehouse' => Yii::t('app', 'To warehouse'),
            'source_type' => Yii::t('app', 'Source type'),
            'source_id' => Yii::t('app', 'Source name'),
            'party_type' => Yii::t('app', 'Party type'),
            'party_id' => Yii::t('app', 'Party name'),
            'type' => Yii::t('app', 'Type'),
            'is_opening' => Yii::t('app', 'Is opening'),
            'is_return' => Yii::t('app', 'Is return'),
            'remarks' => Yii::t('app', 'Remarks'),
            'total_amount' => Yii::t('app', 'Total amount'),
            'total_quantity' => Yii::t('app', 'Total quantity'),
        ], $attributeLabels);
    }

    public static function relations()
    {
        return [
            'items'     => [
                'class' => StockEntryItem::class,
                'type' => Type_Relation::ChildModel
            ],
        ];
    }

    public function getParty()
    {
        $partyClassname = 'app\models\\' . $this->party;
        return $this->hasOne($partyClassname, ['party_id' => 'id']);
    }

    public function getItems()
    {
        return $this->hasMany(StockEntryItem::class, ['stock_entry_id' => 'id']);
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }

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
        // if ($this->isNewRecord && empty($this->id))
        if ($this->isNewRecord)
            $this->id = $this->docNumPreset();

        return true;
    }

    // public function afterFind()
    // {
    //     $this->party_name = $this->party->name;

    //     return parent::afterFind();
    // }

    // Workflow Interface
    public function hasWorkflow()
    {
        return true;
    }

    public function lockUpdate()
    {
        return  $this->status == Status_Transaction::Submitted ||
                $this->status == Status_Transaction::Canceled ||
                $this->status == Status_Transaction::Closed;
    }

    public function lockDelete()
    {
        return $this->status !== Status_Transaction::Canceled;
    }

    public function nextStatus()
    {
        $statuses = Status_Transaction::enums();
        $filtered_statuses = [];

        switch ($this->status) {
            case Status_Transaction::Draft:
                return [
                    Status_Transaction::Submit,
                ];
                break;
            case Status_Transaction::Submitted:
                return [
                    Status_Transaction::Canceled,
                ];
                break;
            default:
        }
        return array_diff($statuses, $filtered_statuses);
    }

    public static function permissions()
    {
        return Type_Permission::enums();
    }

    // PostingInterface
    public function hasInventoryImpact()
    {
        return true;
    }

    public function updateInventory()
    {
    }

    public function hasAccountingImpact()
    {
        return false;
    }

    public function updateAccounting()
    {
    }
}
