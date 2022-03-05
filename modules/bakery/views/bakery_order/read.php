<?php

use app\enums\Production_Status;
use app\helpers\SelectableItems;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\People;

$this->title = $model->stockItem->name . $model->salesDoc->message;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bakery Order'), 'url' => ['index']];

$form = ActiveForm::begin();

echo $this->context->renderPartial('/_form/_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column grid">
            <div class="ui transparent input column">
                <?= $form->field($model->salesDoc->customer, 'name')->textInput(['readonly' => true])
                                ->label('Customer') ?>
                <div class="two fields">
                    <div class="field">
                        <?= $form->field($model->salesDoc->customer, 'phone_number')->textInput(['readonly' => true]) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model->salesDoc, 'delivery_at')->textInput([
                                        'readonly' => true,
                                        'value' => Yii::$app->formatter->asDateTime(
                                                        $model->salesDoc->delivery_at, 'MMM dd YYYY, hh::mm a')
                                    ]) ?>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="two fields">
                    <div class="field">
                        <?= $form->field($model, 'baked_by')->dropDownList(
                                SelectableItems::get(People::class, $model, [
                                    'keyAttribute' => 'id',
                                    'valueAttribute' => 'CONCAT(firstname, " ", surname)',
                                ])
                        ) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model, 'bake_status')->dropDownList(Production_Status::enums()) ?>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <?= $form->field($model, 'decorated_by')->dropDownList(
                                            SelectableItems::get(People::class, $model, [
                                                'keyAttribute' => 'id',
                                                'valueAttribute' => 'CONCAT(firstname, " ", surname)',
                                            ])
                                        ) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model, 'deco_status')->dropDownList(Production_Status::enums()) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui bottom attached padded segment">        
        <?= $form->field($model, 'repeat_order')->checkbox() ?>
        <div class="ui two column grid">
            <div class="ui transparent input column">
                <?= $form->field($model, 'repeat_reason')->textarea(['rows' => 3, 'readonly' => true]) ?>
                <?= $form->field($model, 'repeat_order_unit')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'repeat_order_cost')->textInput(['readonly' => true]) ?>
            </div>
            <div class="ui transparent input column">
                <?= $form->field($model, 'repeat_done_by')->dropDownList(
                                SelectableItems::get(People::class, $model, [
                                        'keyAttribute' => 'id',
                                        'valueAttribute' => 'CONCAT(firstname, " ", surname)',
                                    ])
                                ) ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<?= $this->context->renderPartial('/_form/_footer', ['model' => $model]) ?>
