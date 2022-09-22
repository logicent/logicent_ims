<?php

use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;

?>

<div class="payroll-entry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'salary_structure') ?>

    <?= $form->field($model, 'posting_date') ?>

    <?= $form->field($model, 'payroll_frequency') ?>

    <?= $form->field($model, 'start_period') ?>

    <?php // echo $form->field($model, 'end_period') ?>

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
