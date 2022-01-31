<?php

use app\helpers\SelectableItems;
use app\models\Item;
use app\models\ItemUom;
use yii\helpers\Html;

?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <td class="one wide column center aligned select-row">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
        <?= Html::checkbox($rowId, false, ['value' => $model->id]) ?>
    </td>
    <td class="five wide column">
        <?= Html::activeDropDownList($model, "[{$rowId}]item_id",
                                    SelectableItems::get(Item::class, $model, [
                                        'valueAttribute' => 'name',
                                    ]),
                                    ['class' => 'list-option']) ?>
    </td>
    <td class="two wide column item-qty">
        <?= Html::activeTextInput($model, "[{$rowId}]quantity", ['class' => 'right aligned']) ?>
    </td>
    <td class="three wide column item-uom">
        <?= Html::activeDropDownList($model, "[{$rowId}]uom",
                                        SelectableItems::get(ItemUom::class, $model, [
                                            'valueAttribute' => 'id',
                                        ]),
                                        ['class' => 'list-option']) ?>
    </td>
</tr>