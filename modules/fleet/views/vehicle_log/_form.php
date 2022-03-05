<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\purchase\Supplier;
use app\models\hr\Employee;
use app\models\fleet\Vehicle;

?>

<div class="vehicle-log-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui bottom attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= Html::activeHiddenInput($model, 'doc_status') ?>

                <?= $form->field($model, 'vehicle_id')->dropDownList(Vehicle::getListOptions()) ?>

                <?= $form->field($model, 'make')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'model')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'employee_id')->dropDownList(Employee::getListOptions()) ?>

                <?= $form->field($model, 'trip_date')->textInput(['class' => 'pikaday']) ?>
            </div>
            
            <div class="column">
                <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'supplier_id')->dropDownList(Supplier::getListOptions()) ?>

                <?= $form->field($model, 'fuel_qty')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'odometer')->textInput() ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
