<?php

use logicent\accounts\enums\Type_Module;
?>

<div class="ui bottom attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'module')->dropDownList([
                    Type_Module::Buying => Type_Module::Buying,
                    Type_Module::Selling => Type_Module::Selling
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'currency')->textInput(['value' => 'KES']) ?>
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
    </div>
</div>