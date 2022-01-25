<?php

use app\assets\FlatpickrAsset;
use app\helpers\SelectableItems;
use app\models\Customer;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

FlatpickrAsset::register($this);

$form = ActiveForm::begin([
    'enableClientValidation' => false
]);

echo $this->render('/_form/_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'customer_id')->dropDownList(
                    SelectableItems::get(Customer::class, $model, [
                        'valueAttribute' => 'name'
                    ])
                ) ?>
            <?= $form->field($model, 'issued_at')->textInput(['class' => 'pikadaytime']) ?>
        </div>

        <div class="two fields">
            <?= $form->field($model, 'delivery_date')->textInput(['class' => 'pikadaytime']) ?>
        </div>
    </div>

    <!-- Item table -->
        <?= $this->render('/_form_section/item/list', ['model' => $model, 'form' => $form]) ?>

        <div class="ui two column stackable grid">
            <div class="ui transparent input column">
                <?= $form->field($model, 'total_quantity')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'amounts_tax_incl')->checkbox() ?>
            </div>
            <div class="ui transparent input column">
                <?= $form->field($model, 'total_tax_amount')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'total_amount_due')->textInput(['readonly' => true]) ?>
                <?php //= $form->field($model, 'rounding_adjustment')->textInput() ?>
                <?php //= $form->field($model, 'rounding_total')->textInput(['readonly' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'terms')->textarea(['rows' => 3]) ?>
    </div>

<?php ActiveForm::end(); ?>

<?= $this->render('/_form/_footer', ['model' => $model]);

$this->registerJs($this->render('/_form/_form.js')) ?>

<!-- Item script -->
<?php
$this->registerJs($this->render('/_form_section/item.php', ['model' => $model])) ?>