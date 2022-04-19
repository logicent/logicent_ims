<?php

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'type')->dropDownList([ 'Earning' => 'Earning', 'Deduction' => 'Deduction', ], ['prompt' => '']) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
</div>