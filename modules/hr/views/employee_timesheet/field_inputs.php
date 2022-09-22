<?php

use yii\helpers\Html;
use crudle\ext\hr\models\Employee;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

            <?= $form->field($model, 'employee_name')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'total_working_hours')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'total_billable_hours')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'total_billable_amount')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'total_costing_amount')->textInput(['readonly' => true]) ?>

            <?= Html::activeHiddenInput($model, 'status') ?>

            <?= $form->field($model, 'note')->textarea(['rows' => 4]) ?>

        </div>
    </div>
</div>
