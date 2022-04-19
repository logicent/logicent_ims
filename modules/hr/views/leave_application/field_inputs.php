<?php

use yii\helpers\Html;
use logicent\hr\models\Employee;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);
?>

<div class="ui bottom attached padded segment">

    <?= Html::activeHiddenInput($model, 'status') ?>

    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

            <?= $form->field($model, 'employee_name')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'start_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'end_date')->textInput(['class' => 'pikaday']) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'leave_type')->dropDownList([ 'Leave Without Pay' => 'Leave Without Pay', 'Sick Leave' => 'Sick Leave', 'Compensatory Off' => 'Compensatory Off', 'Privilege Leave' => 'Privilege Leave', 'Casual Leave' => 'Casual Leave', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'reason')->textarea(['rows' => 4, 'style' => 'height: 115px;']) ?>
        </div>
    </div>
</div>