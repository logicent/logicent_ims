<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

<?= $this->render($this->context->formHeader, ['model' => $model]) ?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		            
            <?= $form->field($model, 'item_made')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'mfg_date')->textInput(['class' => 'pikaday']) ?>
            
            <?= $form->field($model, 'shelf_life')->textInput() ?>
        </div>

        <div class="column">
            <?= $form->field($model, 'parent_batch')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'doc_status')->dropDownList([
                'Draft' => 'Available',
                'Submitted' => 'Used',
            ]) ?>
            
            <?= $form->field($model, 'ref_doctype')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'ref_id')->textInput(['maxlength' => true]) ?>            
        </div>    
    </div>
</div>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">            
            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'supplier_id')->dropDownList([]) ?>
        </div>        
    </div>
</div>

<?php ActiveForm::end() ?>

<?= $this->render($this->context->formFooter, ['model' => $model]) ?>
