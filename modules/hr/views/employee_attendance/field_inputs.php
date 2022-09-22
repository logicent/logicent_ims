<?php

use crudle\ext\hr\models\Employee;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

            <?= $form->field($model, 'employee_name')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'workday')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'status')->dropDownList([ 'Present' => 'Present', 'Absent' => 'Absent', 'Half-day' => 'Half-day', 'On Leave' => 'On Leave', ], ['prompt' => '']) ?>
        </div>
    </div>
</div>
