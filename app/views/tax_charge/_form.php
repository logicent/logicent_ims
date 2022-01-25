<?php

use app\enums\Type_Tax;
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

<?php ActiveForm::end();
echo $this->render('/_form/_footer', ['model' => $model]);
$this->registerJs($this->render('/_form/_modal_submit.js'));
