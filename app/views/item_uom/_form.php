<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Checkbox;
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

    <div class="ui bottom attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'inactive')->widget(Checkbox::class)->label('&nbsp;') ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'must_be_whole_number')->widget(Checkbox::class)->label(false) ?>
        </div>
    </div>

<?php ActiveForm::end();
echo $this->render('/_form/_footer', ['model' => $model]);
$this->registerJs($this->render('/_form/_modal_submit.js'));
