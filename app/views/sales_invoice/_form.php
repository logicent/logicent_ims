<?php

use app\enums\Type_Order;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$isReadonly = $this->context->isReadonly;

$form = ActiveForm::begin( [
    'id' => $model->formName(),
    // 'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]);

echo $this->render('/_form/_header', ['model' => $model]) ?>
    <!-- Reference Info -->
    <div class="ui attached padded segment">
        <?= Html::activeHiddenInput($model, 'status') ?>
        <div class="two fields">
            <?= $this->render('/_form_field/customer', ['model' => $model, 'form' => $form]) ?>
            <?= $this->render('/_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'issued_at']) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'order_type')->dropDownList(Type_Order::enums(), ['disabled' => $isReadonly]) ?>
            <?= $this->render('/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'due_date']) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'po_reference')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $this->render('/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'po_date']) ?>
        </div>
    </div>

    <!-- Currency & Price List -->
    <?= $this->render('/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

    <!-- Item table & Document totals -->
    <?= $this->render('/_form_section/item', ['model' => $model, 'form' => $form]) ?>

    <!-- Payment table -->
    <?= $this->render('/_form_section/payment', ['model' => $model, 'form' => $form]) ?>

<?php ActiveForm::end() ?>

<!-- Comments -->
<?= $this->render('/_form/_footer', ['model' => $model]) ?>