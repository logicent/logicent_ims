<?php

use app\helpers\SelectableItems;
use app\models\PaymentMethod;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use app\assets\FlatpickrAsset;

FlatpickrAsset::register($this);

$rowInputStyle = 'border: none; border-radius: 0px; height: 43px';
?>

<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <?php
    if (!$this->context->isReadonly) : ?>
    <td class="select-row center aligned">
        <?= Checkbox::widget([
                'name' => "[{$rowId}]id",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
        <?= $rowId ?>
    </td>
    <?php
    endif ?>
    <td class="five wide mode-of-payment">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
<?php 
    if ($model->isNewRecord || !$model->document->lockUpdate()) :
        echo Html::activeDropDownList($model, "[{$rowId}]payment_method", 
                SelectableItems::get(PaymentMethod::class, $model, [
                    'valueAttribute' => 'id',
                    'filters' => [
                        'inactive' => false
                    ]
                ]),
                [
                    'style' => $rowInputStyle
                ]
            );
    else :
        echo Html::activeTextInput($model, "[{$rowId}]payment_method", ['readonly' => true]);
    endif ?>
    </td>
    <td class="four wide paid-at">
        <?= Html::activeTextInput($model, "[{$rowId}]paid_at", [
                'class' => 'pikadaytime',
                'value' => !empty($model->paid_at) ? Yii::$app->formatter->asDateTime($model->paid_at) : date('Y-m-d H:i:s'),
                'readonly' => true,
                'style' => $rowInputStyle,
            ]) ?>
    </td>
    <td class="three wide paid-amount">
        <?= Html::activeTextInput($model, "[{$rowId}]paid_amount", [
                'class' => 'right aligned',
                'readonly' => !$model->isNewRecord,
                'style' => $rowInputStyle,
            ]) ?>
    </td>
    <td class="one wide center aligned">
<?php
    if (!empty($model->id)) :
        echo Html::a(Elements::icon('print'), 
                        Url::toRoute(['print-preview', 'id' => $model->id]), 
                        [
                            'class' => 'compact ui basic icon button',
                            'target' => '_blank',
                            'style' => 'margin: 0em'
                        ]
                    );
    endif ?>
    </td>
</tr>
