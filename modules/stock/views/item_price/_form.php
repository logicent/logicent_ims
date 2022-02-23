<?php

use app\helpers\SelectableItems;
use app\models\Item;
use app\models\PriceList;
use yii\helpers\ArrayHelper;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$form = ActiveForm::begin([
    'enableClientValidation' => false,
]);

echo $this->context->renderPartial('//_form/_header', ['model' => $model]) ?>

    <div class="ui bottom attached padded segment">
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'price_list_id')->dropDownList(
                        SelectableItems::get(PriceList::class, $model, [
                            'valueAttribute' => 'id'
                        ])
                ) ?>
                <?= $form->field($model, 'stock_item_id')->dropDownList(
                        SelectableItems::get(Item::class, $model, [
                            'valueAttribute' => 'id'
                        ])
                    ) ?>
                <?= $form->field($model, 'item_description')->textarea(['rows' => 2]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'price_list_rate')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'currency')->textInput(['maxlength' => true, 'value' => 'KES']) ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>
