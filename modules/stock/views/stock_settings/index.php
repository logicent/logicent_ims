<?php

use app\helpers\SelectableItems;
use logicent\stock\models\ItemGroup;
use logicent\stock\models\ItemUom;
use logicent\stock\models\Warehouse;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\modules\Select;

$this->title = Yii::t('app', 'Stock Settings');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('//_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <?= $form->field($model, 'auto_suggest_item_code')->checkbox() ?>
        <div class="two fields">
            <?= $form->field($model, 'default_item_group')->dropDownList(
                        SelectableItems::get(ItemGroup::class, $model, [
                            'valueAttribute' => 'id'
                        ])
                    ) ?>
            <?= $form->field($model, 'item_valuation_method')->dropDownList([]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'default_item_uom')->dropDownList(
                    SelectableItems::get(ItemUom::class, $model, [
                        'valueAttribute' => 'id'
                    ])
                ) ?>
            <?= $form->field($model, 'default_warehouse')->dropDownList(
                    SelectableItems::get(Warehouse::class, $model, [
                        'valueAttribute' => 'id'
                    ])
                ) ?>
        </div>
        <?= $form->field($model, 'auto_insert_item_price_if_missing')->checkbox() ?>
        <?= $form->field($model, 'update_existing_price_list_rate')->checkbox() ?>
        <?= $form->field($model, 'allow_negative_stock_balance')->checkbox() ?>
        <?= $form->field($model, 'show_barcode_field_in_stock_transactions')->checkbox() ?>
        <?= $form->field($model, 'raise_purchase_request_when_stock_at_reorder_level')->checkbox() ?>
        <?= $form->field($model, 'notify_by_email_on_creation_of_purchase_request')->checkbox() ?>
    </div>

<?php 
ActiveForm::end();
$this->registerJs($this->render('//_form/_submit.js'));

$this->registerJs(<<<JS

JS)
?>