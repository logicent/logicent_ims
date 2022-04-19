<?php

use app\helpers\SelectableItems;
use app\models\Item;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

$isReadonly = $this->context->isReadonly();
$rowInputStyle = 'border: none; border-radius: 0px; height: 43px';

?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
<?php
    if (!$this->context->isReadonly) : ?>
    <td class="select-row" style="padding: 0em 0.78571429em !important">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id", ['class' => 'row-id']) ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_name") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]item_status") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]gross_profit") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]is_free_item") ?>
        <?= Checkbox::widget([
                'name' => "[{$rowId}]id",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
        <?= $rowId ?>
    </td>
    <?php endif ?>
    <td class="three wide">
    <?php
        if ($model->isNewRecord || !$model->document->lockUpdate()) : ?>
            <?= Html::activeDropDownList($model, "[{$rowId}]item_id",
                                        SelectableItems::get(Item::class, $model, [
                                            'valueAttribute' => 'name',
                                            'filters' => ['inactive' => false]
                                        ]),
                                        [
                                            'class' => 'list-option',
                                            'style' => $rowInputStyle
                                        ]);
        else :
            echo Html::activeTextInput($model, "[{$rowId}]item_name", ['readonly' => true, 'style' => $rowInputStyle]);
            echo Html::activeHiddenInput($model, "[{$rowId}]item_id");
        endif ?>
    </td>
    <td class="two wide item-qty">
        <?= Html::activeTextInput($model, "[{$rowId}]quantity", [
                // 'value' => $model->isNewRecord || !is_null($formData) ? $formData['SalesInvoiceItem[1][quantity]'] : $model->quantity,
                'class' => 'right aligned',
                'readonly' => $isReadonly,
                'style' => $rowInputStyle
            ]) ?>
    </td>
    <td class="two wide item-uom">
        <?= Html::activeTextInput($model, "[{$rowId}]item_uom", [
                'readonly' => true,
                'style' => $rowInputStyle
            ]) ?>
    </td>
    <td class="two wide item-rate">
        <?= Html::activeTextInput($model, "[{$rowId}]unit_price", [
                'class' => 'right aligned',
                'readonly' => $isReadonly,
                'style' => $rowInputStyle,
            ]) ?>
    </td>
    <td class="two wide item-discount" style="display: none">
        <?= Html::activeTextInput($model, "[{$rowId}]discount_amount", ['class' => 'right aligned', 'readonly' => $isReadonly]) ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]discount_percent") ?>
    </td>
    <td class="item-tax" style="display: none;">
        <?= Html::activeHiddenInput($model, "[{$rowId}]tax_amount") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]tax_percent", ['class' => 'tax-rate']) ?>
    </td>
    <td class="two wide item-total">
        <?= Html::activeTextInput($model, "[{$rowId}]total_amount", [
                'class' => 'right aligned',
                'readonly' => true,
                'style' => $rowInputStyle
            ]) ?>
    </td>
    <td class="one wide center aligned">
        <?= Html::a(Elements::icon('pencil', ['class' => 'grey', 'style' => 'margin: 0em']),
                    ['edit-item', 'id' => $model->id],
                    [
                        'class' => 'edit-item--btn',
                        'data' => [
                            'model-class' => get_class($model),
                            'model-id' => $model->id,
                            'form-view' => '/_form_section/item/edit',
                        ],
                        'style' => 'margin: 0em'
                    ]
                ) ?>
    </td>
</tr>