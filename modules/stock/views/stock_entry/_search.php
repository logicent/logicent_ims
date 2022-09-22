<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\stock\models\Warehouse;
use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;
use icms\FomanticUI\modules\Select;

$form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'class' => 'ui form',
        'autocomplete' => 'off'
    ]
]) ?>
    <div class="four fields">
        <?= $form
                ->field( $searchModel, 'from_warehouse' )
                ->widget( Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(Warehouse::class, $searchModel, [
                                    'valueAttribute' => 'id',
                                    'addEmptyFirstItem' => false,
                                ]),
                    'options' => ['prompt' => $searchModel->getAttributeLabel('from_warehouse')],
                ])
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'to_warehouse' )
                ->widget( Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(Warehouse::class, $searchModel, [
                                    'valueAttribute' => 'id',
                                    'addEmptyFirstItem' => false,
                                ]),
                    'options' => ['prompt' => $searchModel->getAttributeLabel('to_warehouse')],
                ])
                ->label(false) ?>
    </div>

    <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small grey button']) ?>
    <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>

<?php ActiveForm::end();