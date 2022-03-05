<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<div class="vehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'updated_by') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'doc_status') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'parent_field') ?>

    <?php // echo $form->field($model, 'parent_doctype') ?>

    <?php // echo $form->field($model, 'idx') ?>

    <?php // echo $form->field($model, 'acquisition_date') ?>

    <?php // echo $form->field($model, 'license_plate') ?>

    <?php // echo $form->field($model, 'carbon_check_date') ?>

    <?php // echo $form->field($model, 'last_odometer') ?>

    <?php // echo $form->field($model, 'policy_no') ?>

    <?php // echo $form->field($model, 'fuel_type') ?>

    <?php // echo $form->field($model, 'vehicle_value') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'employee') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'uom') ?>

    <?php // echo $form->field($model, 'doors') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'insurance_company') ?>

    <?php // echo $form->field($model, 'chassis_no') ?>

    <?php // echo $form->field($model, 'wheels') ?>

    <?php // echo $form->field($model, 'make') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
