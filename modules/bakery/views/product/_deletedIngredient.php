<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use Zelenin\yii\SemanticUI\modules\Checkbox;

use app\models\BakeryItem; ?>

<tr id="BakeryItemDeleted_<?= $row_id ?>">
    
    <td class="center aligned select-row">
        <?= Html::checkbox($row_id) ?>
    </td>
    <td class="six wide column">
        <?= Html::activeHiddenInput($model, "[{$row_id}]id") ?>
    
        <?= Html::activeDropDownList($model, "[{$row_id}]ingredient_id", 
                                    ArrayHelper::map(BakeryItem::getListOptions(),'id','name'), 
                                    ['prompt' => '', 'class' => 'bakery-item']) ?>
    </td>
    <td class="two wide column qty-required">
        <?= Html::activeTextInput($model, "[{$row_id}]qty_required", ['class' => 'right aligned']) ?>
    </td>
    <td class="four wide column unit-cost">
        <?= Html::activeTextInput($model, "[{$row_id}]unit_cost", ['class' => 'right aligned']) ?>
    </td>
    <td class="ui transparent input item-cost">
        <?= Html::activeTextInput($model, "[{$row_id}]total_cost", ['class' => 'right aligned', 'readonly' => true]) ?>
    </td>

</tr>
