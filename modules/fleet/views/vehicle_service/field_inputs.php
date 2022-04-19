<?php

use yii\helpers\Html;
?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= Html::activeHiddenInput($model, 'doc_status') ?>

            <?= $form->field($model, 'vehicle_id')->dropDownList([]) ?>

            <?= $form->field($model, 'service_item')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="column">
            <?= $form->field($model, 'type')->dropDownList([]) ?>
        
            <?= $form->field($model, 'frequency')->dropDownList([]) ?>

            <?= $form->field($model, 'expense_amount')->textInput(['maxlength' => true]) ?>
        </div>            
    </div>
</div>