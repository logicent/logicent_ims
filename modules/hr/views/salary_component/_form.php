<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="salary-component-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

                <?= $form->field($model, 'type')->dropDownList([ 'Earning' => 'Earning', 'Deduction' => 'Deduction', ], ['prompt' => '']) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
