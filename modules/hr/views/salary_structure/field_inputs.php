<?php

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'enabled')->checkbox() ?>

            <?= $form->field($model, 'is_default')->checkbox() ?>
        </div>        
    </div>
</div>

<div class="ui attached padded segment">
    
    <?= $form->field($model, 'use_timesheet')->checkbox() ?>

    <div class="ui two column stackable grid">
        <div class="column">

            <?= $form->field($model, 'ts_salary_component')->textInput() ?>

            <?= $form->field($model, 'hour_rate')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'total_earning')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'total_deduction')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'net_pay')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'payroll_frequency')->dropDownList([ 
                            'Weekly' => 'Weekly', 'Monthly' => 'Monthly', ], ['prompt' => ''
                        ]) ?>
        
            <?= $form->field($model, 'mode_of_payment')->dropDownList([]) ?>

            <?= $form->field($model, 'payment_account')->textInput(['maxlength' => true]) ?>
        </div>        
    </div>
</div>