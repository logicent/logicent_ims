<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\hr\EmployeeAttendanceTool */
/* @var $form ActiveForm */
?>
<div class="tool">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'employee_ids') ?>
        <?= $form->field($model, 'workday') ?>
        <?= $form->field($model, 'department') ?>
        <?= $form->field($model, 'branch') ?>
        <?= $form->field($model, 'company') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tool -->
