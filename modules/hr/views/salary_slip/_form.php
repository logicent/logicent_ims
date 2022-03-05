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

<div class="salary-slip-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

                <?= $form->field($model, 'employee_name')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'designation')->dropDownList([]) ?>

                <?= $form->field($model, 'from_period')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'to_period')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'working_days')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'has_timesheet')->checkbox() ?>

                <?= $form->field($model, 'hour_rate')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'leave_without_pay')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'payment_days')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="column">
                <?= $form->field($model, 'salary_structure')->dropDownList([]) ?>

                <?php $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

                <?php $form->field($model, 'branch')->dropDownList([]) ?>

                <?= $form->field($model, 'department')->dropDownList([]) ?>
            </div>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column ui transparent input">
                <?= $form->field($model, 'total_working_hours')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'gross_pay')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_deduction')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_principal_amount')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_loan_repayment')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'total_interest_amount')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'net_pay')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'rounded_total')->textInput(['readonly' => true]) ?>
            </div>

            <div class="column">
                <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'bank_account_no')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
