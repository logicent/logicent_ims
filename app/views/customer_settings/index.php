<?php

use app\helpers\SelectableItems;
use app\models\CustomerGroup;
use app\models\PriceList;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\modules\Select;

$this->title = Yii::t('app', 'Customer Settings');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('/_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <?= $form->field($model, 'auto_suggest_customer_id')->checkbox() ?>

        <div class="two fields">
            <?= $form->field($model, 'default_customer_group')->dropDownList(
                    SelectableItems::get(CustomerGroup::class, $model, [
                        'valueAttribute' => 'id'
                    ])
                ) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'default_selling_price_list')->dropDownList(
                    SelectableItems::get(PriceList::class, $model, [
                        'valueAttribute' => 'id'
                    ])
                ) ?>
        </div>
        <?= $form->field($model, 'maintain_same_rate_in_sales_cycle')->checkbox() ?>
        <?= $form->field($model, 'validate_selling_price_for_item_against_purchase_rate_or_valuation_rate')->checkbox() ?>
        <?= $form->field($model, 'allow_user_to_edit_price_list_rate_in_transactions')->checkbox() ?>
        <?= $form->field($model, 'calculate_item_bundle_price_based_on_child_items_rates')->checkbox() ?>
        <?= $form->field($model, 'hide_customers_tax_ID_from_sales_transaction')->checkbox() ?>
        <?= $form->field($model, 'allow_item_to_be_added_multiple_times_in_a_transactation')->checkbox() ?>
        <?= $form->field($model, 'allow_multiple_sales_orders_against_a_customers_PO')->checkbox() ?>
        <?= $form->field($model, 'require_sales_order_for_sales_invoice')->checkbox() ?>
        <?= $form->field($model, 'require_delivery_note_for_sales_invoice')->checkbox() ?>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('/_form/_submit.js'));

$this->registerJs(<<<JS

JS)
?>