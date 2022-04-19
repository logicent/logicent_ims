<?php

use yii\helpers\Html;
use logicent\production\models\ProductionStage;

?>

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