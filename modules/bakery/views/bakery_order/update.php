<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\People;

$salesOrderItem = $model->getSalesOrderItem()->one();
if ($salesOrderItem->salesDoc->is_combined) :
    $items = explode(',', $model->item_id);
    $displayName = '';
    foreach ($items as $item) :
        $displayName .= stockItem::find()->where(['id' => $item])->one()->name . ' / ';
    endforeach;
    $displayName = rtrim($displayName, ' / ');
else :
    $displayName = $salesOrderItem->itemName;
endif;

$this->title = $displayName . $salesOrderItem->salesDoc->message;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bakery Order'), 'url' => ['index']];

$form = ActiveForm::begin();

echo $this->context->renderPartial('/_form/_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column grid">

            <div class="ui transparent input column">
                <?= $form->field($salesOrderItem->salesDoc->customer, 'name')->textInput(['readonly' => true])
                                ->label('Customer') ?>
                <div class="two fields">
                    <div class="field">
                        <?= Html::activeLabel($salesOrderItem->salesDoc->customer, 'phone_number') .
                            Html::activeTextInput($salesOrderItem->salesDoc->customer, 'phone_number', [
                                                'readonly' => true]) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($salesOrderItem->salesDoc, 'delivery_at')->textInput([
                                        'readonly' => true,
                                        'value' => Yii::$app->formatter->asDateTime(
                                                        $salesOrderItem->salesDoc->delivery_at, 'MMM dd YYYY, hh::mm a')
                                    ]) ?>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="two fields">
                    <div class="field">
                    <?php
                        if ($salesOrderItem->bake_status == 'Not Started' || empty($salesOrderItem->bake_status) ||
                            Yii::$app->user->can('System Manager')) :
                            echo $form->field($salesOrderItem, 'baked_by')->dropDownList([]);
                        else :
                            echo $form->field($salesOrderItem->cakeBakedBy, 'description')
                                        ->textInput(['readonly' => true])
                                        ->label('Baked By');
                        endif ?>
                    </div>
                    <div class="field">
                        <?= $form->field($salesOrderItem, 'bake_status')->dropDownList($salesOrderItem->nextBakeStatus()) ?>
                    </div>
                </div>
            <?php
                if ($salesOrderItem->bake_status == 'Finished') : // && $model->salesItem->addIcingFinish ?>
                <div class="two fields">
                    <div class="field">
                    <?php
                        if ($salesOrderItem->deco_status == 'Not Started' || empty($salesOrderItem->deco_status) ||
                            Yii::$app->user->can('System Manager')) :
                            echo $form->field($salesOrderItem, 'decorated_by')->dropDownList([]);
                        else :
                            echo $form->field($salesOrderItem->cakeDecoratedBy, 'description')
                                    ->textInput(['readonly' => true])
                                    ->label('Decorated By');
                        endif ?>
                    </div>
                    <div class="field">
                        <?= $form->field($salesOrderItem, 'deco_status')->dropDownList($salesOrderItem->nextDecoStatus()) ?>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="ui bottom attached padded segment">
        
        <?= $form->field($salesOrderItem, 'repeat_order')->checkbox() ?>

        <div class="ui two column grid">
            <div class="ui transparent input column">
                <?= $form->field($salesOrderItem, 'repeat_reason')->textarea(['rows' => 3, 'readonly' => true]) ?>
                <?= $form->field($salesOrderItem, 'repeat_order_unit')->textInput(['readonly' => true]) ?>
                <?= $form->field($salesOrderItem, 'repeat_order_cost')->textInput(['readonly' => true]) ?>
            </div>
            <div class="ui transparent input column">
                <?= $form->field($salesOrderItem, 'repeat_done_by')->dropDownList([]) ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<?= $this->context->renderPartial('/_form/_footer', ['model' => $model]) ?>
