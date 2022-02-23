<?php

use app\helpers\SelectableItems;
use logicent\stock\models\Branch;
use logicent\stock\models\Warehouse;
use yii\helpers\Html;
use yii\jui\Selectable;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);
    
echo $this->render('//_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'inactive')->widget(Checkbox::class)->label('&nbsp;') ?>
            </div>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'email_address')->widget(
                        MaskedInput::class, [
                            'clientOptions' => ['alias' =>  'email']
                        ]) ?>    
                <?= $form->field($model, 'physical_address')->textArea(['rows' => 2]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'branch')->dropDownList(SelectableItems::get(
                        Branch::class, $model, [
                            'valueAttribute' => 'id',
                            'filters' => ['inactive' => false]
                        ])
                    ) ?>
                <?= $form->field($model, 'parent_warehouse')->dropDownList(
                        SelectableItems::get(Warehouse::class, $model, [
                            'valueAttribute' => 'id',
                            'filters' => ['is_group' => true]
                        ])
                    ) ?>
                <?= $form->field($model, 'is_group')->checkbox() ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);
$this->registerJs($this->render('//_form/_modal_submit.js')) ?>