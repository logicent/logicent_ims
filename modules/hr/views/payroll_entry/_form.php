<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\hr\SalaryStructure;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

?>

<div class="payroll-entry-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'salary_structure')->dropDownList(SalaryStructure::getListOptions()) ?>

                <?= $form->field($model, 'posting_date')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'payroll_frequency')->dropDownList([ 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', ], ['prompt' => '']) ?>

                <?= $form->field($model, 'start_period')->textInput(['class' => 'pikaday']) ?>

                <?= $form->field($model, 'end_period')->textInput(['class' => 'pikaday']) ?>

            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
