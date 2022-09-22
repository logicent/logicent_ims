<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use icms\FomanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use icms\FomanticUI\modules\Select;
use icms\FomanticUI\widgets\ActiveForm;

use app\models\StockItemGroup;

$form = ActiveForm::begin([
    'enableClientValidation' => false,
]);

echo $this->context->renderPartial('/_form/_header', ['model' => $model]) ?>

<!-- General -->
    <div class="ui attached padded segment">
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true,
                                // 'autofocus' => true 
                                ]) ?>
                <?= $form->field($model, 'item_group')->dropDownList(ArrayHelper::map(StockItemGroup::getListOptions(), 'id', 'name'), ['prompt' => '']) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'description')->textArea(['rows' => 2]) ?>
                <?= $form->field($model, 'disabled')->checkbox() ?>
                <?= $form->field($model, 'item_type')->hiddenInput()->label(false) ?>
            </div>
        </div>
    </div>

<!-- Stock / Production -->
    <div class="ui attached padded segment">
        <?= $form->field($model, 'is_stock_item')->checkbox() ?>
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'stock_uom')->dropDownList([
                        'Kg' => 'Kg',
                        'Gram' => 'Gram',
                        'Litre' => 'Litre',
                        'Millilitre' => 'Millilitre'
                ]) ?>
                <div class="ui transparent input two fields">
                    <div class="field">
                        <?= $form->field($model, 'qty_in_stock')->textInput(['readonly' => true]) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model, 'qty_reserved')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui two fields">
                    <div class="field">
                        <?= $form->field($model, 'net_weight')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model, 'weight_uom')->dropDownList([
                            'Kg' => 'Kg',
                                'Gram' => 'Gram',
                                'Litre' => 'Litre',
                                'Millilitre' => 'Millilitre'
                        ]) ?>
                    </div>
                </div>
                <?= $form->field($model, 'opening_stock')->textInput(['readonly' => !$model->isNewRecord]) ?>
                <?php //= $form->field($model, 'default_bom')->dropDownList([]) ?>
            </div>
        </div>
    </div>

<!-- Buying / Accounting -->
    <div class="ui bottom attached padded segment">
        <?= $form->field($model, 'is_purchase_item')->checkbox() ?>
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'last_purchase_rate')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'tax_rate')->textInput(['maxlength' => true]) ?>
                <?php // $form->field($model, 'expense_account')->dropDownList([]) ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>