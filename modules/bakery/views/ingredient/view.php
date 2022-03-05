<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\StockItemGroup;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredient'), 'url' => ['index']];
?>

<?php
    $form = ActiveForm::begin();

    echo $this->context->renderPartial('/_form/_header', ['model' => $model]) ?>

<!-- General -->
    <div class="ui attached segment">
        <div class="ui two column grid">
            <div class="ui transparent input column">
                <?= $form->field($model, 'name')->textInput(['readonly' => true]) ?>
                <?= $form->field($model->itemGroup, 'name')->textInput(['readonly' => true]) ?>
            </div>
            <div class="ui transparent input column">
                <?= $form->field($model, 'description')->textArea(['rows' => 2]) ?>
                <?= $form->field($model, 'disabled')->checkbox(['class' => 'disabled']) ?>
            </div>
        </div>
    </div>

<!-- Stock / Production -->
    <div class="ui attached segment">
        <?= $form->field($model, 'is_stock_item')->checkbox(['class' => 'disabled']) ?>
        <div class="ui two column grid">
            <div class="ui transparent input column">
                <?= $form->field($model, 'stock_uom')->textInput(['readonly' => true]) ?>
                <div class="ui two fields">
                    <div class="field">
                        <?= $form->field($model, 'qty_in_stock')->textInput(['readonly' => true]) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model, 'qty_reserved')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="ui transparent input column">
                <div class="ui two fields">
                    <div class="field">
                        <?= $form->field($model, 'net_weight')->textInput(['readonly' => true]) ?>
                    </div> 
                    <div class="field">
                        <?= $form->field($model, 'weight_uom')->textInput(['readonly' => true]) ?>
                    </div>
                </div> 
                <?= $form->field($model, 'default_bom')->textInput(['readonly' => true]) ?>
            </div>
        </div>
    </div>

<!-- Buying / Accounting -->
    <div class="ui bottom attached segment">
        <?= $form->field($model, 'is_purchase_item')->checkbox(['class' => 'disabled']) ?>
        <div class="ui two column grid">
            <div class="ui transparent input column">
                <?= $form->field($model, 'last_purchase_rate')->textInput(['readonly' => true]) ?>
            </div>
            <div class="ui transparent input column">
                <?= $form->field($model, 'expense_account')->textInput(['readonly' => true]) ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>
