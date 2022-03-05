<?php

use app\models\Customer;
use app\assets\FlatpickrAsset;
use logicent\sales\enums\Type_Order;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

FlatpickrAsset::register($this);

$modal = Modal::begin([
    'id' => 'customer_modal',
    'size' => Size::SMALL,
]);
$modal::end();

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

        <div class="ui two column grid">
            <div class="column">
                <?= $this->render('/_form_field/customer', ['model' => $model, 'form' => $form]) ?>
                <?= $form->field($model, 'po_reference')->textInput() ?>
                <?= $form->field($model, 'order_type')->dropDownList(Type_Order::enums()) ?>
            </div>
            <div class="column">
                <?= $this->render('//_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'issued_at']) ?>
                <?= $this->render('//_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'po_date']) ?>
            </div>
        </div>
    </div>

    <!-- Currency & Price list -->
    <?= $this->render('@system_modules/accounts/views/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

    <!-- Item table & Document totals -->
    <?= $this->render('//_form_section/item', ['model' => $model, 'form' => $form]) ?>

    <!-- Payment table -->
    <?= $this->render('//_form_section/payment', ['model' => $model, 'form' => $form]) ?>

<?php ActiveForm::end(); ?>

<!-- Comments -->
<?= $this->render('//_form/_footer', ['model' => $model]) ?>