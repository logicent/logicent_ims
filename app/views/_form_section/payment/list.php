<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

?>

<div class="ui secondary attached segment centered sub header">
    <?= Yii::t('app', 'Payment') ?>
</div>
<div id="_payment" class="ui attached padded segment">
    <table class="in-form ui celled table">
        <thead>
            <tr>
            <?php
            if (!$this->context->isReadonly) : ?>
                <th class="one wide center aligned select-all-rows">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'labelOptions' => ['label' => false]]) ?>
                </th>
            <?php
            endif ?>
                <th class="six wide"><?= Yii::t('app', 'Payment method') ?></th>
                <th class="four wide"><?= Yii::t('app', 'Date paid') ?></th>
                <th class="four wide right aligned"><?= Yii::t('app', 'Amount') ?></th>
                <th class="one wide"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($model->isCopyRecord) :
                $paymentModelClass = StringHelper::basename($this->context->paymentModelClass);
                foreach ($model->copyDetailModels[$paymentModelClass] as $id => $detailModel) :
                    echo $this->render('_form', [
                                        'model' => $detailModel,
                                        'rowId' => $id
                                    ]);
                endforeach;
            elseif (!empty($model->payments)) :
                foreach ($model->payments as $id => $paymentModel) :
                    echo $this->render('_form', [
                                        'model' => $paymentModel,
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
                        'modelClass' => $this->context->modelClass . 'Payment'
                    ],
                    'style' => 'display : none'
                ]);
        // endif;
        if (!$model->lockPayment()) :
            echo Elements::button('Add Payment', [
                    'class' => 'compact small add-row',
                    'data'  => [
                        'model-class' => $this->context->modelClass . 'Payment',
                        'form-view' => '/_form_section/payment/_form',
                    ]
                ]);
        endif;
    endif ?>
</div>
<div class="ui attached padded segment">
    <?= $form->field($model, 'terms')->textarea(['rows' => 3, 'readonly' => $this->context->isReadonly]) ?>
</div>