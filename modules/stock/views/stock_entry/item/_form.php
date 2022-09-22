<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\stock\models\Item;
use crudle\ext\stock\models\ItemUom;
use yii\helpers\Html;

$isReadonly = $this->context->isReadonly();

?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <?php if (!$isReadonly) : ?>
    <td class="one wide column center aligned select-row">
        <?= Html::checkbox($rowId, false, ['value' => $model->id]) ?>
    </td>
    <?php endif ?>
    <td class="five wide column">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]barcode") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]serial_no") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]batch_no") ?>
        <?php
        if (!$isReadonly) :
            echo Html::activeDropDownList($model, "[{$rowId}]item_id",
                                    SelectableItems::get(Item::class, $model, [
                                        'valueAttribute' => 'name',
                                    ]),
                                    ['class' => 'list-option']);
        else :
            echo Html::activeHiddenInput($model, "[{$rowId}]item_id");
            echo Html::activeTextInput($model, "[{$rowId}]item_name", ['readonly' => $isReadonly]);
        endif ?>
    </td>
    <td class="two wide column item-qty">
        <?= Html::activeTextInput($model, "[{$rowId}]quantity", ['class' => 'right aligned', 'readonly' => $isReadonly]) ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_rate") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_total") ?>
    </td>
    <td class="three wide column item-uom">
    <?php
        if (!$isReadonly) :
            echo Html::activeDropDownList($model, "[{$rowId}]uom",
                                        SelectableItems::get(ItemUom::class, $model, [
                                            'valueAttribute' => 'id',
                                        ]),
                                        ['class' => 'list-option']);
        else :
            echo Html::activeTextInput($model, "[{$rowId}]uom", ['readonly' => $isReadonly]);
        endif ?>
    </td>
</tr>