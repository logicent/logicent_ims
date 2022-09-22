<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\accounts\models\PaymentMethod;
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
                ->field( $searchModel, 'payment_method' )
                ->widget( Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(PaymentMethod::class, $searchModel, [
                                    'valueAttribute' => 'id',
                                    'addEmptyFirstItem' => false,
                                ]),
                    'options' => ['prompt' => $searchModel->getAttributeLabel('payment_method')],
                ])
                ->label(false) ?>
    </div>

    <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small grey button']) ?>
    <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>

<?php ActiveForm::end(); 
$this->registerJs(<<<JS
    $('.inline.fields').removeClass('grouped');
JS)
?>
