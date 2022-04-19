<?php

use logicent\hr\models\Employee;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'identity_card')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'personal_email')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'birth_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'sex')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'current_address')->textarea(['rows' => 5]) ?>         
        </div>            
    </div>
</div>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'emp_type')->dropDownList(Employee::getEmpType()) ?>
        
            <?= $form->field($model, 'emp_code')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'designation')->dropDownList([]) ?>

            <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'hired_on')->textInput(['class' => 'pikaday']) ?>
        
            <?= $form->field($model, 'left_on')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'reason_left')->textarea(['rows' => 5]) ?>            
        </div>            
    </div>
</div>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'health_fund_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tax_identifier')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'social_security_id')->textInput(['maxlength' => true]) ?>   
        </div>
        <div class="column">
            <?= $form->field($model, 'blood_group')->dropDownList([ 
                'A-' => 'A-', 
                'A+' => 'A+', 
                'AB+' => 'AB+', 
                'AB-' => 'AB-', 
                'B+' => 'B+', 
                'B-' => 'B-', 
                'O+' => 'O+', 
                'O-' => 'O-'
            ], ['prompt' => '']) ?>

            <?= $form->field($model, 'additional_info')->textarea(['rows' => 5]) ?>
        </div>            
    </div>
</div>