<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\accounts\enums\Type_Module;
use crudle\ext\accounts\models\PriceList;
use crudle\ext\purchase\models\Supplier;
use crudle\ext\stock\models\Warehouse;
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'default_supplier')->dropDownList(
                SelectableItems::get(Supplier::class, $model, [
                    'valueAttribute' => 'name',
                    'filters' => ['inactive' => false]
                ])
            ) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'default_price_list')->dropDownList(
                SelectableItems::get(PriceList::class, $model, [
                    'valueAttribute' => 'id',
                    'filters' => ['inactive' => false, 'module' => Type_Module::Buying]
                ])
            ) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'default_warehouse')->dropDownList(
                SelectableItems::get(Warehouse::class, $model, [
                    'valueAttribute' => 'id',
                    'filters' => ['inactive' => false]
                ])
            ) ?>
    </div>
</div>
