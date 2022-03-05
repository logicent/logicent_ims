<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\hr\Employee;

?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= Html::activeHiddenInput($model, 'doc_status') ?>

                <?= $form->field($model, 'license_plate')->widget(MaskedInput::className(), [
                    'mask' => 'KAA 999A']) ?>

                <?= $form->field($model, 'acquisition_date')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'vehicle_value')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'fuel_type')->dropDownList([]) ?>
            </div>

            <div class="column">
                <?= $form->field($model, 'employee')->dropDownList(Employee::getListOptions()) ?>

                <?= $form->field($model, 'start_date')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'end_date')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'last_odometer')->textInput() ?>

                <?php $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'uom')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'chassis_no')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="column">
                <?= $form->field($model, 'doors')->textInput() ?>

                <?= $form->field($model, 'wheels')->textInput() ?>

                <?= $form->field($model, 'carbon_check_date')->textInput(['class' => 'pikaday']) ?>
            </div>
        </div>
    </div>

    <div class="ui bottom attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'insurance_company')->textInput(['maxlength' => true]) ?>            
                <?= $form->field($model, 'policy_no')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
