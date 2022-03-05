<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\production\ProductionStage;

?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

<?= $this->render($this->context->formHeader, ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'is_active')->checkbox([
                    'inputOptions' => ['readonly' => $model->isReadOnly]
                ]) ?>
            </div>
        </div>
    </div>

<?php
    $columns = [
        [
            'attribute' => 'production_stage_id',
            'label' => 'Stage',
            'format' => 'raw',
            'value' => function ( $model ) {
                if ($this->context->action->id == 'read')
                    return Html::tag('span', $model->stage->name);
                
                return // include hidden inputs
                    Html::activeHiddenInput($model, "[$model->id]id") .
                    Html::activeHiddenInput($model, "[$model->id]production_line_id") .
                    Html::activeDropDownList($model, "[$model->id]production_stage_id", ProductionStage::getListOptions());
            }
        ],
    ] ?>

    <?= $this->render('/layouts/_view/_tabularInput', [
                        'dataProvider' => $lineStageDataProvider, 
                        'columns' => $columns,
                        'doc_model' => $model
                    ]);
    ?>

    <div class="ui bottom attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
            </div>            
        </div>
    </div>

<?php ActiveForm::end();

// $params = [
//     'table_id' => '#' . StringHelper::basename($this->context->id),
//     'parent_id' => $model->id,
//     'form_id' => '',
//     // 'table_row' => $this->render('_item', [
//     //                              'form' => $form, 
//     //                              'model' => $model::newItem(),
//     //                          ]),
// ];

// $this->registerJs(
//     "var doc = "  .\yii\helpers\Json::htmlEncode($params) . ";",
//     $this::POS_HEAD,
//     'doc'
// );

// $this->registerJs($this->render('item.js'))
?>

<?= $this->render($this->context->formFooter, ['model' => $model]) ?>
