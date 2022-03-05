<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

?>
<div class="ui attached padded segment">
    <table id="_item" class="in-form ui celled table">
        <thead>
            <tr>
        <?php 
            if ($this->context->action->id == 'create' || $this->context->action->id == 'update') : ?>
                <th class="one wide column center aligned select-all-rows">
                    <?= Html::checkbox('0') ?>
                </th>
        <?php
            endif ?>
                <th class="five wide column"><?= Yii::t('app', 'Item') ?></th>
                <th class="two wide column"><?= Yii::t('app', 'Qty') ?></th>
                <th class="three wide column"><?= Yii::t('app', 'Uom') ?></th>
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
                echo $this->render('@system_modules/accounts/views/_form_section/_no_data');
            endif ?>
        </tbody>
    <?php 
        if ($this->context->action->id != 'read') : ?>
        <tfoot>
            <tr>
                <td colspan="4">
                    <?= Elements::button('Delete', ['class' => 'compact red mini del-row', 'style' => 'display : none']) ?>
                    <?= Elements::button('Add Item', [
                                    'class' => 'compact mini add-row',
                                    'data'  => [
                                        'url' => Url::to(['add-item']),
                                        'model-class' => $this->context->modelClass . 'Item',
                                        'form-view' => 'item//_form',
                                    ]
                                ]) ?>
                </td>
            </tr>
        </tfoot>
    <?php 
        endif ?>
    </table>
</div>

<?php
$this->registerJs($this->render('list.js'));