<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\stock\models\ItemGroup;
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
                ->field( $searchModel, 'id' )
                ->textInput( ['placeholder' => $searchModel->getAttributeLabel('id')] )
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'barcode' )
                ->textInput( ['placeholder' => $searchModel->getAttributeLabel('barcode')] )
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'item_group' )
                ->widget( Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(ItemGroup::class, $searchModel, [
                                    'valueAttribute' => 'id',
                                    'addEmptyFirstItem' => false,
                                ]),
                    'options' => ['prompt' => $searchModel->getAttributeLabel('item_group')],
                ])
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'tax_code' )
                ->textInput( ['placeholder' => $searchModel->getAttributeLabel('tax_code')] )
                ->label(false) ?>
    </div>

    <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small grey button']) ?>
    <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>

<?php ActiveForm::end(); 
$this->registerJs(<<<JS
    $('.inline.fields').removeClass('grouped');
JS)
?>
