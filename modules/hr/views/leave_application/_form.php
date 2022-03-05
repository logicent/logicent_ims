<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\hr\Employee;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

$form = ActiveForm::begin(['enableClientValidation' => false]) ?>

<?= $this->render($this->context->formHeader, ['model' => $model]) ?>

<div class="ui bottom attached padded segment">

    <?= Html::activeHiddenInput($model, 'status') ?>

    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

            <?= $form->field($model, 'employee_name')->textInput(['readonly' => true]) ?>

            <?= $form->field($model, 'start_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'end_date')->textInput(['class' => 'pikaday']) ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'leave_type')->dropDownList([ 'Leave Without Pay' => 'Leave Without Pay', 'Sick Leave' => 'Sick Leave', 'Compensatory Off' => 'Compensatory Off', 'Privilege Leave' => 'Privilege Leave', 'Casual Leave' => 'Casual Leave', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'reason')->textarea(['rows' => 4, 'style' => 'height: 115px;']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>

<?= $this->render($this->context->formFooter, ['model' => $model]) ?>
