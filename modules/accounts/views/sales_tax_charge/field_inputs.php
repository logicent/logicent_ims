<?php

use crudle\ext\accounts\enums\Type_Tax;
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'type')->dropDownList(Type_Tax::enums()) ?>
    </div>
</div>