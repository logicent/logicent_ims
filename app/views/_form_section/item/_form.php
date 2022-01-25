<?php

use app\helpers\SelectableItems;
use app\models\Item;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;


$isReadonly = $this->context->isReadonly;
?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
<?php
    if (!$this->context->isReadonly) : ?>
    <td class="one wide center aligned select-row">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_name") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_status") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_uom") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]gross_profit") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]is_free_item") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]account_id") ?>
        <?= Checkbox::widget([
                'model' => $model,
                'attribute' => "[{$rowId}]id",
                'labelOptions' => ['label' => false]
            ]) ?>
    </td>
    <?php endif ?>
    <td class="five wide">
    <?php
        if ($model->isNewRecord || !$model->document->lockUpdate()) : ?>
            <?= Html::activeDropDownList($model, "[{$rowId}]item_id",
                                        SelectableItems::get(Item::class, $model, [
                                            'valueAttribute' => 'name',
                                            'filters' => ['inactive' => false]
                                        ]),
                                        ['class' => 'list-option']);
        else :
            echo Html::activeTextInput($model, "[{$rowId}]item_name", ['readonly' => true]);
            echo Html::activeHiddenInput($model, "[{$rowId}]item_id");
        endif ?>
    </td>
    <td class="two wide item-qty">
        <?= Html::activeTextInput($model, "[{$rowId}]quantity", ['class' => 'right aligned', 'readonly' => $isReadonly]) ?>
    </td>
    <td class="three wide item-rate">
        <?= Html::activeTextInput($model, "[{$rowId}]unit_price", ['class' => 'right aligned', 'readonly' => $isReadonly]) ?>
    </td>
    <td class="two wide item-discount" style="display: none">
        <?= Html::activeTextInput($model, "[{$rowId}]discount_amount", ['class' => 'right aligned', 'readonly' => $isReadonly]) ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]discount_percent") ?>
    </td>
    <td class="item-tax" style="display: none;">
        <?= Html::activeHiddenInput($model, "[{$rowId}]tax_amount") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]tax_percent", ['class' => 'tax-rate']) ?>
    </td>
    <td class="three wide item-total">
        <?= Html::activeTextInput($model, "[{$rowId}]total_amount", ['class' => 'right aligned', 'readonly' => true]) ?>
    </td>
    <td class="one wide center aligned">
<?php
    if (!empty($model->id)) :
        echo Html::a(Elements::icon('horizontal ellipsis'),
                        ['edit-item', 'id' => $model->id],
                        [
                            'class' => 'compact ui basic icon button edit-item--btn',
                            'data' => [
                                'model-class' => get_class($model),
                                'model-id' => $model->id,
                                'form-view' => '/_form_section/item/edit',
                            ]
                        ]
                    );
    endif ?>
    </td>
</tr>