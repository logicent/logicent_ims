<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);

echo $this->render('/_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= Html::activeHiddenInput($model, 'id') ?>
            <?= $form->field($model, 'item_id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'barcode')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'item_uom')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

<?php ActiveForm::end();
$this->registerJs($this->render('/_form/_modal_submit.js'));
