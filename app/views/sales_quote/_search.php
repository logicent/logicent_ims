<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\sales\SalesQuoteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-quote-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //= $form->field($model, 'id') ?>

    <?php //= $form->field($model, 'status') ?>

    <?php //= $form->field($model, 'issued_at') ?>

    <?php //= $form->field($model, 'valid_till') ?>

    <?php //= $form->field($model, 'customer_id') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'authorized_by') ?>

    <?php // echo $form->field($model, 'total_amount_due') ?>

    <?php // echo $form->field($model, 'total_tax_amount') ?>

    <?php // echo $form->field($model, 'amounts_tax_incl') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
