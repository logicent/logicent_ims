<?php

use yii\helpers\Html;
use yii\widgets\MaskedInput;
use crudle\ext\hr\models\Employee;

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= Html::activeHiddenInput($model, 'doc_status') ?>

            <?= $form->field($model, 'license_plate')->widget(MaskedInput::class, [
                'mask' => 'KAA 999A']) ?>

            <?= $form->field($model, 'acquisition_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'vehicle_value')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'fuel_type')->dropDownList([]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'employee')->dropDownList(Employee::getListOptions()) ?>

            <?= $form->field($model, 'start_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'end_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'last_odometer')->textInput() ?>

            <?php $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
            <?php $form->field($model, 'uom')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
</div>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'chassis_no')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'doors')->textInput() ?>

            <?= $form->field($model, 'wheels')->textInput() ?>

            <?= $form->field($model, 'carbon_check_date')->textInput(['class' => 'pikaday']) ?>
        </div>
    </div>
</div>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'insurance_company')->textInput(['maxlength' => true]) ?>            
            <?= $form->field($model, 'policy_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
</div>