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

?>

<div class="employee-timesheet-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

                <?= $form->field($model, 'employee_name')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_working_hours')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_billable_hours')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_billable_amount')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_costing_amount')->textInput(['readonly' => true]) ?>

                <?= Html::activeHiddenInput($model, 'status') ?>

                <?= $form->field($model, 'note')->textarea(['rows' => 4]) ?>

            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
