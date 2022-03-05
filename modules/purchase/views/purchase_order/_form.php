<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin( [
    'id' => $model->formName(),
    // 'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]);

echo $this->render('//_form/_header', ['model' => $model]) ?>
    <!-- Reference Info -->
    <div class="ui attached padded segment">
        <?= Html::activeHiddenInput($model, 'status') ?>

        <div class="two fields">
            <?= $this->render('//_form_field/supplier', ['model' => $model, 'form' => $form]) ?>
            <?= $this->render('//_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'issued_at']) ?>
        </div>

        <div class="two fields">
            <?= $form->field($model, 'pr_reference')->textInput() ?>
            <?= $this->render('//_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'pr_date']) ?>
        </div>
    </div>

    <!-- Currency & Price List -->
    <?= $this->render('@system_modules/accounts/views/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

    <!-- Item table & Document totals -->
    <?= $this->render('//_form_section/item', ['model' => $model, 'form' => $form]) ?>

    <!-- Payment table -->
    <?= $this->render('//_form_section/payment', ['model' => $model, 'form' => $form]) ?>

<?php ActiveForm::end(); ?>

<!-- Comments -->
<?= $this->render('//_form/_footer', ['model' => $model]) ?>