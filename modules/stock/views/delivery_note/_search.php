<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\stock\modelsWarehouse;
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
    </div>

    <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small grey button']) ?>
    <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>

<?php ActiveForm::end();