<?php

use crudle\app\helpers\SelectableItems;
use yii\helpers\Html;

use crudle\ext\stock\models\ItemGroup;
use crudle\ext\stock\models\ItemUom;
use crudle\ext\stock\models\Warehouse;
use crudle\ext\purchase\models\Supplier;
use crudle\ext\accounts\models\SalesTaxCharge;

$isReadonly = $this->context->isReadonly();
?>

<!-- General -->
<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'status') ?>
    <?= Html::activeHiddenInput($model, 'item_type') ?>
    <?= Html::activeFileInput($model->uploadForm, 'file_upload', [
            'accept' => 'image/*', 'style' => 'display: none'
        ]) ?>
    <?php // echo Html::tag('div', Html::activeLabel($model, 'image_path'), ['class' => 'field']) ?>
    <?= Html::activeHiddenInput($model, 'image_path', ['id' => 'file_path']) ?>
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>
        <?= $form->field($model, 'barcode')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
    </div>
    <div class="two fields">
    </div>
    <div class="two fields">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        <?= $form->field($model, 'item_group')->dropDownList(
                SelectableItems::get(ItemGroup::class, $model, ['valueAttribute' => 'id'])
            ) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'description')->textArea([
                'rows' => 3,
                'readonly' => $isReadonly,
                'style' => 'min-height: 125px'
            ]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
</div>
<!-- Stock -->
<div class="ui attached padded segment">
    <?= $form->field($model, 'is_stock_item')->checkbox() ?>
    <div class="two fields">
        <?= $form->field($model, 'opening_stock')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>
        <?= $form->field($model, 'qty_in_stock')->textInput(['readonly' => true]) ?>
    </div>
    <!-- <div class="two fields"> -->
        <?php //= $form->field($model, 'qty_ordered')->textInput(['readonly' => true]) ?>
    <!-- </div> -->
    <!-- <div class="two fields"> -->
        <?php //= $form->field($model, 'qty_committed')->textInput(['readonly' => true]) ?>
        <?php //= $form->field($model, 'qty_reserved')->textInput(['readonly' => true]) ?>
    <!-- </div> -->
    <div class="two fields">
        <?= $form->field($model, 'default_warehouse')->dropDownList(
                SelectableItems::get(Warehouse::class, $model, ['valueAttribute' => 'id'])
            ) ?>
        <?= $form->field($model, 'item_uom')->dropDownList(
                SelectableItems::get(ItemUom::class, $model, ['valueAttribute' => 'id'])
            ) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'net_weight')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        <?= $form->field($model, 'weight_uom')->dropDownList(
                SelectableItems::get(ItemUom::class, $model, ['valueAttribute' => 'id'])
            ) ?>
    </div>
</div>

<!-- Selling / Accounting -->
<div class="ui attached padded segment">
    <?= $form->field($model, 'is_sales_item')->checkbox() ?>
    <div class="two fields">
        <?= $form->field($model, 'standard_rate', ['options' => ['class' => 'field number']])
                ->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
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
        <?= $form->field($model, 'last_purchase_rate', ['options' => ['class' => 'field number']])->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
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
                SelectableItems::get(SalesTaxCharge::class, $model, ['valueAttribute' => 'id'])
            ) ?>
        <?= $form->field($model, 'tax_rate')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
    </div>
</div>