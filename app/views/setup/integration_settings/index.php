<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$this->title = Yii::t('app', 'Integration');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('/_form/_modal_header', ['model' => $model]) ?>

    <!-- Check if Mobile Money Payments is enabled in Developer settings -->
    <div class="ui secondary attached centered header segment text-muted">
        <?= Yii::t('app', 'Mobile Money Payment') ?>
    </div>
    <div class="ui attached padded segment">
        <div class="eight wide field">
            <?= $form->field( $model, 'mpesaApiKey' )->textInput( ['maxlength' => true] ) ?>
        </div>
    </div>

    <!-- Check if USSD SMS is enabled in Developer settings -->
    <div class="ui secondary attached centered header segment text-muted">
        <?= Yii::t('app', 'USSD & SMS') ?>
    </div>
    <div class="ui bottom attached padded segment">
        <div class="eight wide field">
            <?= $form->field( $model, 'ussdApiKey' )->textInput( ['maxlength' => true] ) ?>
        </div>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('/_form/_submit.js'));
?>