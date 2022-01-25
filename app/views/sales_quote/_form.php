<?php

use app\enums\Type_Order;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin( [
    'id' => $model->formName(),
    // 'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]);

echo $this->render('/_form/_header', ['model' => $model]) ?>
    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $this->render('/_form_field/customer', ['model' => $model, 'form' => $form]) ?>
            <?= $this->render('/_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'issued_at']) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'order_type')->dropDownList(Type_Order::enums()) ?>
            <?= $this->render('/_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'valid_till']) ?>
        </div>
    </div>

    <!-- Currency & Price list -->
    <?= $this->render('/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

    <!-- Item table & Document totals -->
    <?= $this->render('/_form_section/item', ['model' => $model, 'form' => $form]) ?>

    <div class="ui attached padded segment">
        <?= $form->field($model, 'terms')->textarea(['rows' => 3]) ?>
    </div>
<?php ActiveForm::end() ?>

<!-- Comments -->
<?= $this->render('/_form/_footer', ['model' => $model]) ?>