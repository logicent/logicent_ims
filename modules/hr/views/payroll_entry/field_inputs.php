<?php

use crudle\ext\hr\models\SalaryStructure;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'salary_structure')->dropDownList([]) ?>

            <?= $form->field($model, 'posting_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'payroll_frequency')->dropDownList([ 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'start_period')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'end_period')->textInput(['class' => 'pikaday']) ?>

        </div>
    </div>
</div>