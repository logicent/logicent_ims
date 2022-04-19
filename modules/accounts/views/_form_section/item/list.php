<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\Modal;


$modal = Modal::begin([
    'id' => 'item__modal',
    'size' => Size::MEDIUM,
]);
$modal::end();
?>

<div id="_item" class="ui attached padded segment">
<?php
    if (in_array('update_stock', array_keys($model->attributes))) :
        echo $form->field($model, 'update_stock')->checkbox(['class' => $this->context->isReadonly() ? 'read-only' : '']);
    endif ?>

    <table class="in-form ui celled table">
        <thead>
            <tr style="font-size: 110%">
        <?php
            if (!$this->context->isReadonly()) : ?>
                <th class="select-all-rows" width="8%">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'options' => ['style' => 'vertical-align: text-top']]) ?>
                    <?= Yii::t('app', 'No.') ?>
                </th>
        <?php
            endif ?>
                <th class="three wide"><?= Yii::t('app', 'Item') ?></th>
                <th class="two wide right aligned"><?= Yii::t('app', 'Qty') ?></th>
                <th class="two wide"><?= Yii::t('app', 'UoM') ?></th>
                <th class="two wide right aligned"><?= Yii::t('app', 'Price') ?></th>
                <th class="two wide right aligned" style="display: none"><?= Yii::t('app', 'Disc. amt') ?></th>
                <th style="display:none;"><?= Yii::t('app', 'Tax rate') ?></th>
                <th class="two wide right aligned"><?= Yii::t('app', 'Amount') ?></th>
                <th class="one wide center aligned">
                    <?= Html::a(Elements::icon('ellipsis horizontal', ['class' => 'grey', 'style' => 'margin-right: 0em']),
                                false,
                                ['class' => 'compact ui icon']) ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($model->isCopyRecord) :
                $itemModelClass = StringHelper::basename($this->context->itemModelClass);
                foreach ($model->copyDetailModels[$itemModelClass] as $id => $detailModel) :
                    echo $this->render('_form', [
                                        'model' => $detailModel,
                                        'rowId' => $id
                                    ]);
                endforeach;
            elseif (!empty($model->items)) :
                foreach ($model->items as $id => $itemModel) :
                    echo $this->render('_form', [
                                        'model' => $itemModel,
                                        'rowId' => $id + 1
                                    ]);
                endforeach;
            else : // $model->isNewRecord
                echo $this->render('../_no_data');
            endif ?>
        </tbody>
    </table>
<?php
    if (!$model->lockUpdate()) :
        // if ($model->isNewRecord || !$model->lockDelete()) :
            echo Elements::button('Delete', [
                    'class' => 'compact red small del-row',
                    'data' => [
                        'modelClass' => $this->context->modelClass() . 'Item'
                    ],
                    'style' => 'display : none'
                ]);
        // endif;
        echo Elements::button('Add Item', [
                'class' => 'compact small add-row',
                'data'  => [
                    'model-class' => $this->context->modelClass() . 'Item',
                    'form-view' => '/_form_section/item/_form',
                ]
            ]);
    endif ?>
</div>