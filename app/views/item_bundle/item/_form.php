<?php

use app\helpers\SelectableItems;
use app\models\Item;
use yii\helpers\Html;

$isReadonly = $this->context->isReadonly;
?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <td class="one wide column center aligned select-row">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
        <?= Html::checkbox($rowId, false, ['value' => $model->id]) ?>
    </td>
    <td class="five wide column">
    <?php
        if ($model->isNewRecord) : ?>
            <?= Html::activeDropDownList($model, "[{$rowId}]item_id",
                                        SelectableItems::get(Item::class, $model, [
                                            'valueAttribute' => 'name',
                                        ]),
                                        ['class' => 'list-option']);
        else :
            echo Html::activeTextInput($model, "[{$rowId}]item_id", ['class' => 'right aligned', 'readonly' => $isReadonly]);
        endif ?>
    </td>
    <td class="two wide column item-qty">
        <?= Html::activeTextInput($model, "[{$rowId}]quantity", ['class' => 'right aligned', 'readonly' => !$model->isNewRecord]) ?>
    </td>
    <td class="three wide column item-uom">
        <?= Html::activeTextInput($model, "[{$rowId}]uom", ['class' => 'right aligned', 'readonly' => $isReadonly]) ?>
    </td>
</tr>