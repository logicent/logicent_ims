<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\sales\models\CustomerGroup;
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
                ->field( $searchModel, 'phone_number' )
                ->textInput( ['placeholder' => $searchModel->getAttributeLabel('phone_number')] )
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'email_address' )
                ->textInput( ['placeholder' => $searchModel->getAttributeLabel('email_address')] )
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'party_group' )
                ->widget( Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(CustomerGroup::class, $searchModel, [
                                    'valueAttribute' => 'id',
                                    'addEmptyFirstItem' => false,
                                ]),
                    'options' => ['prompt' => $searchModel->getAttributeLabel('party_group')],
                ])
                ->label(false) ?>
        <?= $form
                ->field( $searchModel, 'tax_Id' )
                ->textInput( ['placeholder' => $searchModel->getAttributeLabel('tax_Id')] )
                ->label(false) ?>
    </div>

    <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small grey button']) ?>
    <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>

<?php ActiveForm::end(); 
$this->registerJs(<<<JS
    $('.inline.fields').removeClass('grouped');
JS)
?>
