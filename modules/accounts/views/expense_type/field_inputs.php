<?php

use app\helpers\SelectableItems;
use app\models\ExpenseType;
use app\models\PaymentMethod;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    </div>
</div>
