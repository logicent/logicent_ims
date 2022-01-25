<?php

use app\enums\Resource_Action;
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

<div class="ui secondary attached segment centered sub header">
    <?= Yii::t('app', 'Item') ?>
</div>
<div id="_item" class="ui attached padded segment">
    <table class="in-form ui celled table">
        <thead>
            <tr>
        <?php 
            if (!$this->context->isReadonly) : ?>
                <th class="one wide column center aligned select-all-rows">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'labelOptions' => ['label' => false]]) ?>
                </th>
        <?php
            endif ?>
                <th class="five wide column"><?= Yii::t('app', 'Item') ?></th>
                <th class="two wide column right aligned"><?= Yii::t('app', 'Qty') ?></th>
                <th class="three wide column right aligned"><?= Yii::t('app', 'Unit price') ?></th>
                <th class="two wide column right aligned" style="display: none"><?= Yii::t('app', 'Disc. amt') ?></th>
                <th style="display:none;"><?= Yii::t('app', 'Tax rate') ?></th>
                <th class="three wide column right aligned"><?= Yii::t('app', 'Total') ?></th>
                <th width="5%"></th>
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
                                        'rowId' => $id
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
                        'modelClass' => $this->context->modelClass . 'Item'
                    ],
                    'style' => 'display : none'
                ]);
        // endif;
        echo Elements::button('Add Item', [
                'class' => 'compact small add-row',
                'data'  => [
                    'model-class' => $this->context->modelClass . 'Item',
                    'form-view' => '/_form_section/item/_form',
                ]
            ]);
    endif ?>
</div>