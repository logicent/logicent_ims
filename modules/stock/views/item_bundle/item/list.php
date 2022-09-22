<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

?>

<div class="ui secondary attached segment centered sub header">
    <?= Yii::t('app', 'Item') ?>
</div>
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
                <th class="two wide column right aligned"><?= Yii::t('app', 'Qty') ?></th>
                <th class="three wide column right aligned"><?= Yii::t('app', 'Uom') ?></th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($model->isNewRecord || empty($model->items)) :
                echo $this->render('@extModules/accounts/views/_form_section/_no_data');
            else :
                foreach ($model->items as $id => $item)
                    echo $this->render('_form', [
                                        'model' => $item,
                                        'rowId' => $id
                                    ]);
            endif;
        ?>
        </tbody>
    <?php 
        if ($this->context->action->id != 'view') : ?>
        <tfoot>
            <tr>
                <td colspan="4">
                    <?= Elements::button('Delete', ['class' => 'compact red mini del-row', 'style' => 'display : none']) ?>
                    <?php 
                        if ($model->isNewRecord) :
                            echo Elements::button('Add Item', [
                                    'class' => 'compact mini add-row',
                                    'data'  => [
                                        'url' => Url::to(['add-item']),
                                        'model-class' => $this->context->modelClass . 'Item',
                                        'form-view' => 'item//_form',
                                    ]
                                ]);
                        endif ?>
                </td>
            </tr>
        </tfoot>
    <?php 
        endif ?>
    </table>
</div>

<?php
$this->registerJs($this->render('list.js'));