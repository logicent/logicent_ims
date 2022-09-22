<?php

use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;

?>

<div class="salary-structure-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'enabled') ?>

    <?php // echo $form->field($model, 'is_default') ?>

    <?php // echo $form->field($model, 'payroll_frequency') ?>

    <?php // echo $form->field($model, 'use_timesheet') ?>

    <?php // echo $form->field($model, 'ts_salary_component') ?>

    <?php // echo $form->field($model, 'hour_rate') ?>

    <?php // echo $form->field($model, 'total_earning') ?>

    <?php // echo $form->field($model, 'total_deduction') ?>

    <?php // echo $form->field($model, 'net_pay') ?>

    <?php // echo $form->field($model, 'mode_of_payment') ?>

    <?php // echo $form->field($model, 'payment_account') ?>

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
