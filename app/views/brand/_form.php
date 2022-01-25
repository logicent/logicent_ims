<?php

use app\enums\Type_Module;
use app\helpers\SelectableItems;
use app\models\PriceList;
use app\models\Supplier;
use app\models\Warehouse;
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
            <?= $form->field($model, 'default_warehouse')->dropDownList(
                    SelectableItems::get(Warehouse::class, $model, [
                        'valueAttribute' => 'id',
                        'filters' => ['inactive' => false]
                    ])
                ) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'default_price_list')->dropDownList(
                    SelectableItems::get(PriceList::class, $model, [
                        'valueAttribute' => 'id',
                        'filters' => ['inactive' => false, 'module' => Type_Module::Buying]
                    ])
                ) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'default_supplier')->dropDownList(
                    SelectableItems::get(Supplier::class, $model, [
                        'valueAttribute' => 'name',
                        'filters' => ['inactive' => false]
                    ])
                ) ?>
        </div>
    </div>

<?php ActiveForm::end();
echo $this->render('/_form/_footer', ['model' => $model]);
$this->registerJs($this->render('/_form/_modal_submit.js'));
