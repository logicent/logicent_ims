<?php

use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;

?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'emp_type') ?>

    <?= $form->field($model, 'tax_identifier') ?>

    <?php // echo $form->field($model, 'health_fund_id') ?>

    <?php // echo $form->field($model, 'social_security_id') ?>

    <?php // echo $form->field($model, 'identity_card') ?>

    <?php // echo $form->field($model, 'emp_code') ?>

    <?php // echo $form->field($model, 'current_address') ?>

    <?php // echo $form->field($model, 'personal_email') ?>

    <?php // echo $form->field($model, 'company_email') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'designation') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'blood_group') ?>

    <?php // echo $form->field($model, 'additional_info') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'hired_on') ?>

    <?php // echo $form->field($model, 'left_on') ?>

    <?php // echo $form->field($model, 'reason_left') ?>

    <?php // echo $form->field($model, 'born_on') ?>

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
