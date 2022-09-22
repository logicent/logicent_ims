<?php

use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;

?>

<div class="salary-slip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'salary_structure') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'employee_name') ?>

    <?= $form->field($model, 'designation') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'branch') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'from_period') ?>

    <?php // echo $form->field($model, 'to_period') ?>

    <?php // echo $form->field($model, 'working_days') ?>

    <?php // echo $form->field($model, 'hour_rate') ?>

    <?php // echo $form->field($model, 'leave_without_pay') ?>

    <?php // echo $form->field($model, 'payment_days') ?>

    <?php // echo $form->field($model, 'gross_pay') ?>

    <?php // echo $form->field($model, 'total_deduction') ?>

    <?php // echo $form->field($model, 'total_principal_amount') ?>

    <?php // echo $form->field($model, 'total_loan_repayment') ?>

    <?php // echo $form->field($model, 'total_interest_amount') ?>

    <?php // echo $form->field($model, 'net_pay') ?>

    <?php // echo $form->field($model, 'rounded_total') ?>

    <?php // echo $form->field($model, 'total_working_hours') ?>

    <?php // echo $form->field($model, 'bank_name') ?>

    <?php // echo $form->field($model, 'bank_account_no') ?>

    <?php // echo $form->field($model, 'has_timesheet') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
