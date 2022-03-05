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

<div class="payment-entry-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

    <?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">

        <?= Html::activeHiddenInput($model, 'doc_status') ?>
    
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'payment_type')->dropDownList([]) ?>
            
                <?= $form->field($model, 'party')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'party_type')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'party_name')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'party_balance')->textInput(['readonly' => true]) ?>
            
                <?= $form->field($model, 'paid_amount')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'received_amount')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'paid_to')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'paid_from')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'difference_amount')->textInput(['readonly' => true]) ?>

                <?php $form->field($model, 'naming_series')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'target_exchange_rate')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'base_paid_amount')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'amended_from')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'base_received_amount')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'base_total_allocated_amount')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'source_exchange_rate')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'clearance_date')->textInput() ?>
                <?php $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'subscription')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'project')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'paid_to_account_currency')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'paid_from_account_balance')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'paid_from_account_currency')->textInput(['maxlength' => true]) ?>
                <?php $form->field($model, 'paid_to_account_balance')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="column">
                <?= $form->field($model, 'posting_date')->textInput(['class' => 'pikaday']) ?>
                <?= $form->field($model, 'reference_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'reference_date')->textInput(['class' => 'pikaday']) ?>
                <?= $form->field($model, 'mode_of_payment')->dropDownList([]) ?>

                <?= $form->field($model, 'unallocated_amount')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'allocate_payment_amount')->textInput() ?>

                <?= $form->field($model, 'total_allocated_amount')->textInput(['readonly' => true]) ?>
                
            </div>
        </div>
    </div>

    <div class="ui bottom attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
            </div>    
        </div>    
    </div>    

    <?php ActiveForm::end() ?>

    <?= $this->render($this->context->formFooter, ['model' => $model]) ?>

</div>
