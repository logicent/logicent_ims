<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPriceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-item-price-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'updated_by') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'parent') ?>

    <?php // echo $form->field($model, 'parent_field') ?>

    <?php // echo $form->field($model, 'parent_doctype') ?>

    <?php // echo $form->field($model, 'idx') ?>

    <?php // echo $form->field($model, 'price_list_rate') ?>

    <?php // echo $form->field($model, 'module') ?>

    <?php // echo $form->field($model, 'stock_item_id') ?>

    <?php // echo $form->field($model, '_comments') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, 'price_list_id') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, '_liked_by') ?>

    <?php // echo $form->field($model, '_user_tags') ?>

    <?php // echo $form->field($model, 'item_description') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
