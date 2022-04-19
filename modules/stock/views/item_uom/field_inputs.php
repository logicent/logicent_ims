<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Checkbox;
?>

<div class="ui bottom attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->widget(Checkbox::class)->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'must_be_whole_number')->widget(Checkbox::class)->label(false) ?>
    </div>
</div>