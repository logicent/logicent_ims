<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

?>

<div class="ui secondary attached padded segment sub header">
    <?= Yii::t('app', 'Payment') ?>
</div>
<div id="_payment" class="ui attached padded segment">
    <table class="in-form ui celled table">
        <thead>
            <tr>
            <?php
            if (!$this->context->isReadonly) : ?>
                <th class="select-all-rows" width="8%">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'options' => ['style' => 'vertical-align: text-top']]) ?>
                    <?= Yii::t('app', 'No.') ?>
                </th>
            <?php
            endif ?>
                <th class="five wide"><?= Yii::t('app', 'Payment method') ?></th>
                <th class="four wide"><?= Yii::t('app', 'Date paid') ?></th>
                <th class="three wide right aligned"><?= Yii::t('app', 'Amount') ?></th>
                <th class="one wide center aligned">
                    <?= Html::a(Elements::icon('cog', ['class' => 'basic grey', 'style' => 'margin-right: 0em']),
                                false,
                                ['class' => 'compact ui icon']) ?>
                </th>
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