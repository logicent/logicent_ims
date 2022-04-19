<?php

use yii\helpers\Html;
use logicent\sales\models\Customer;
use logicent\stock\models\Item;
?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= Html::activeHiddenInput($model, 'doc_status', []) ?>
            <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'production_date')->textInput(['class' => 'pikaday']) ?>
            <?= $form->field($model, 'shelf_life')->textInput() ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'issue_date')->textInput(['class' => 'pikaday']) ?>
            <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'authorized_by')->textInput(['readonly' => true]) ?>
        </div>
    </div>
</div>

<?php
$columns = [
    [
        'attribute' => 'item_id',
        'format' => 'raw',
        'value' => function ( $model ) {
            if ($this->context->action->id == 'read')
                return Html::tag('span', $model->stock->name);
            
            return // include hidden inputs
                Html::activeHiddenInput($model, "[$model->id]id") .
                Html::activeHiddenInput($model, "[$model->id]work_order_id") .
                Html::activeDropDownList($model, "[$model->id]item_id", []); // make
        }
    ],
] ?>

<?= $this->render('/layouts/_view/_tabularInput', [
                'dataProvider' => $productDataProvider, 
                'columns' => $columns,
                'doc_model' => $model
            ]);
?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'customer_id')->dropDownList([]) ?>
            <?= $form->field($model, 'billing_address')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'summary')->textarea(['rows' => 3]) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'delivery_at')->textInput(['class' => 'pikaday']) ?>
            <?= $form->field($model, 'delivery_address')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'delivery_instructions')->textarea(['rows' => 3]) ?>                  
        </div>
    </div>
</div>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">    
            <?= $form->field($model, 'notes')->textarea(['rows' => 4]) ?>                
        </div>
    </div>
</div>