<?php

use yii\helpers\Html;
use crudle\ext\purchase\models\Supplier;
use crudle\ext\hr\models\Employee;
use crudle\ext\fleet\models\Vehicle;
?>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= Html::activeHiddenInput($model, 'doc_status') ?>

            <?= $form->field($model, 'vehicle_id')->dropDownList([]) ?>

            <?= $form->field($model, 'make')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'model')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

            <?= $form->field($model, 'trip_date')->textInput(['class' => 'pikaday']) ?>
        </div>
        
        <div class="column">
            <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'supplier_id')->dropDownList(Supplier::getListOptions()) ?>

            <?= $form->field($model, 'fuel_qty')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'odometer')->textInput() ?>
        </div>
    </div>
</div>