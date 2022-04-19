<?php

use app\helpers\SelectableItems;
use logicent\accounts\models\Branch;
use logicent\stock\models\Warehouse;
use yii\helpers\Html;
use yii\jui\Selectable;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\modules\Checkbox;
?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'inactive')->widget(Checkbox::class)->label('&nbsp;') ?>
        </div>
    </div>
</div>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'email_address')->widget(
                    MaskedInput::class, [
                        'clientOptions' => ['alias' =>  'email']
                    ]) ?>    
            <?= $form->field($model, 'physical_address')->textArea(['rows' => 2]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'branch')->dropDownList(SelectableItems::get(
                    Branch::class, $model, [
                        'valueAttribute' => 'id',
                        'filters' => ['inactive' => false]
                    ])
                ) ?>
            <?= $form->field($model, 'parent_warehouse')->dropDownList(
                    SelectableItems::get(Warehouse::class, $model, [
                        'valueAttribute' => 'id',
                        'filters' => ['is_group' => true]
                    ])
                ) ?>
            <?= $form->field($model, 'is_group')->checkbox() ?>
        </div>
    </div>
</div>