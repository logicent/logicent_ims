<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\fleet\Vehicle;

?>

<div class="vehicle-service-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= Html::activeHiddenInput($model, 'doc_status') ?>

                <?= $form->field($model, 'vehicle_id')->dropDownList(Vehicle::getListOptions()) ?>

                <?= $form->field($model, 'service_item')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="column">
                <?= $form->field($model, 'type')->dropDownList([]) ?>
            
                <?= $form->field($model, 'frequency')->dropDownList([]) ?>

                <?= $form->field($model, 'expense_amount')->textInput(['maxlength' => true]) ?>
            </div>            
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
