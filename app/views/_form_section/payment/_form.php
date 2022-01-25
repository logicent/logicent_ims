<?php

use app\helpers\SelectableItems;
use app\models\PaymentMethod;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

?>

<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <?php
    if (!$this->context->isReadonly) : ?>
    <td class="one wide center aligned select-row">
        <?= Checkbox::widget(['model' => $model, 'attribute' => "[{$rowId}]id", 'labelOptions' => ['label' => false]]) ?>
    </td>
    <?php
    endif ?>
    <td class="six wide mode-of-payment">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
<?php 
    if ($model->isNewRecord || !$model->document->lockUpdate()) :
        echo Html::activeDropDownList($model, "[{$rowId}]payment_method", 
                SelectableItems::get(PaymentMethod::class, $model, [
                    'valueAttribute' => 'id',
                    'filters' => [
                        'inactive' => false
                    ]
                ])
            );
    else :
        echo Html::activeTextInput($model, "[{$rowId}]payment_method", ['readonly' => true]);
    endif ?>
    </td>
    <td class="five wide paid-at">
        <?= Html::activeTextInput($model, "[{$rowId}]paid_at", [
                                    // 'class' => 'pikadaytime',
                                    'readonly' => true,
                                    'value' => !empty($model->paid_at) ? Yii::$app->formatter->asDateTime($model->paid_at) : date('Y-m-d H:i:s')
                                ]) ?>
    </td>
    <td class="three wide paid-amount">
        <?= Html::activeTextInput($model, "[{$rowId}]paid_amount", ['class' => 'right aligned', 'readonly' => !$model->isNewRecord]) ?>
    </td>
    <td class="one wide center aligned">
<?php
    if (!empty($model->id)) :
        echo Html::a(Elements::icon('print'), 
                        Url::toRoute(['print-preview', 'id' => $model->id]), 
                        ['class' => 'compact ui basic icon button', 'target' => '_blank']
                    );
    endif ?>
    </td>
</tr>
