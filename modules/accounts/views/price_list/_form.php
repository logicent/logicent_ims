<?php

use app\enums\Type_Module;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);
    
echo $this->render('//_form/_modal_header', ['model' => $model]) ?>

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

<?php ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);
$this->registerJs($this->render('//_form/_modal_submit.js'));
