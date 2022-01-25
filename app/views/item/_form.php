<?php

use app\helpers\SelectableItems;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\ItemGroup;
use app\models\ItemUom;
use app\models\Warehouse;
use app\models\Supplier;
use app\models\TaxCharge;

$isReadonly = $this->context->isReadonly;

$form = ActiveForm::begin( [
    'id' => $model->formName(),
    'enableClientValidation' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
        'data' => [
            'modal_id' => 'modal__item'
        ]
    ],
]);


echo $this->render('/_form/_header', ['model' => $model]);
if (!$model->isNewRecord) :
    echo $this->render('_linkedData', ['model' => $model]);
endif ?>

<!-- General -->
    <div class="ui attached padded segment">
        <?= Html::activeHiddenInput($model, 'status') ?>
        <?= Html::activeHiddenInput($model, 'opening_stock') ?>
        <?= Html::activeHiddenInput($model, 'item_type') ?>

        <div class="two fields">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'barcode')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'description')->textArea(['rows' => 2, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'item_group')->dropDownList(
                    SelectableItems::get(ItemGroup::class, $model, ['valueAttribute' => 'id'])
                ) ?>
        </div>
    </div>

    <!-- Stock -->
    <div class="ui attached padded segment">
        <?= $form->field($model, 'is_stock_item')->checkbox() ?>
        <div class="two fields">
            <?= $form->field($model, 'default_warehouse')->dropDownList(
                    SelectableItems::get(Warehouse::class, $model, ['valueAttribute' => 'id'])
                ) ?>
            <?= $form->field($model, 'item_uom')->dropDownList([]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'net_weight')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'weight_uom')->dropDownList(
                    SelectableItems::get(ItemUom::class, $model, ['valueAttribute' => 'id'])
                ) ?>
        </div>
        <!-- <div class="two fields"> -->
            <?php //= $form->field($model, 'qty_in_stock')->textInput(['readonly' => true]) ?>
            <?php //= $form->field($model, 'qty_reserved')->textInput(['readonly' => true]) ?>
            <?php //= $form->field($model, 'qty_ordered')->textInput(['readonly' => true]) ?>
            <?php //= $form->field($model, 'qty_committed')->textInput(['readonly' => true]) ?>
        <!-- </div> -->
    </div>

    <!-- Selling / Accounting -->
    <div class="ui attached padded segment">
        <?= $form->field($model, 'is_sales_item')->checkbox() ?>
        <div class="two fields">
            <?= $form->field($model, 'standard_rate')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'sales_uom')->dropDownList(
                    SelectableItems::get(ItemUom::class, $model, ['valueAttribute' => 'id'])
                ) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'max_discount')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        </div>
    </div>

    <!-- Buying / Accounting -->
    <div class="ui attached padded segment">
        <?= $form->field($model, 'is_purchase_item')->checkbox() ?>
        <div class="two fields">
            <?= $form->field($model, 'last_purchase_rate')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'purchase_uom')->dropDownList(
                    SelectableItems::get(ItemUom::class, $model, ['valueAttribute' => 'id'])
                ) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'min_order_qty')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'default_supplier')->dropDownList(
                    SelectableItems::get(Supplier::class, $model, ['valueAttribute' => 'name'])
                ) ?>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'tax_code')->dropDownList(
                    SelectableItems::get(TaxCharge::class, $model, ['valueAttribute' => 'id'])
                ) ?>
            <?= $form->field($model, 'tax_rate')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

<?= $this->context->renderPartial('/_form/_footer', ['model' => $model]) ?>
