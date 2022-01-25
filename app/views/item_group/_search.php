<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-item-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'updated_by') ?>

    <?= $form->field($model, 'docstatus') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'parentfield') ?>

    <?php // echo $form->field($model, 'parenttype') ?>

    <?php // echo $form->field($model, 'idx') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, '_comments') ?>

    <?php // echo $form->field($model, '_user_tags') ?>

    <?php // echo $form->field($model, '_liked_by') ?>

    <?php // echo $form->field($model, 'default_income_account') ?>

    <?php // echo $form->field($model, 'default_cost_center') ?>

    <?php // echo $form->field($model, 'is_group') ?>

    <?php // echo $form->field($model, 'route') ?>

    <?php // echo $form->field($model, 'parent_item_group') ?>

    <?php // echo $form->field($model, 'show_in_website') ?>

    <?php // echo $form->field($model, 'default_expense_account') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
