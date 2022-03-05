<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<div class="work-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reference') ?>

    <?= $form->field($model, 'doc_status') ?>

    <?= $form->field($model, 'issue_date') ?>

    <?= $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'product_qty') ?>

    <?php // echo $form->field($model, 'batch_no') ?>

    <?php // echo $form->field($model, 'production_date') ?>

    <?php // echo $form->field($model, 'shelf_life') ?>

    <?php // echo $form->field($model, 'total_cost') ?>

    <?php // echo $form->field($model, 'customer_id') ?>

    <?php // echo $form->field($model, 'billing_address') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'delivery_at') ?>

    <?php // echo $form->field($model, 'delivery_address') ?>

    <?php // echo $form->field($model, 'delivery_instructions') ?>

    <?php // echo $form->field($model, 'authorized_by') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
