<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StockItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'updated_by') ?>

    <?php // $form->field($model, 'docstatus') ?>

    <?php // $form->field($model, 'parent') ?>

    <?php // $form->field($model, 'parentfield') ?>

    <?php // echo $form->field($model, 'parenttype') ?>

    <?php // echo $form->field($model, 'idx') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, '_comments') ?>

    <?php // echo $form->field($model, '_user_tags') ?>

    <?php // echo $form->field($model, '_liked_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'default_supplier') ?>

    <?php // echo $form->field($model, 'net_weight') ?>

    <?php // echo $form->field($model, 'expense_account') ?>

    <?php // echo $form->field($model, 'max_discount') ?>

    <?php // echo $form->field($model, 'income_account') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'default_material_request_type') ?>

    <?php // echo $form->field($model, 'item_group') ?>

    <?php // echo $form->field($model, 'thumbnail') ?>

    <?php // echo $form->field($model, 'has_variants') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'is_sales_item') ?>

    <?php // echo $form->field($model, 'is_stock_item') ?>

    <?php // echo $form->field($model, 'min_order_qty') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'last_purchase_rate') ?>

    <?php // echo $form->field($model, 'show_in_website') ?>

    <?php // echo $form->field($model, 'slideshow') ?>

    <?php // echo $form->field($model, 'is_purchase_item') ?>

    <?php // echo $form->field($model, 'weight_uom') ?>

    <?php // echo $form->field($model, 'disabled') ?>

    <?php // echo $form->field($model, 'naming_series') ?>

    <?php // echo $form->field($model, 'website_image') ?>

    <?php // echo $form->field($model, 'buying_cost_center') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'stock_uom') ?>

    <?php // echo $form->field($model, 'sales_uom') ?>

    <?php // echo $form->field($model, 'purchase_uom') ?>

    <?php // echo $form->field($model, 'default_bom') ?>

    <?php // echo $form->field($model, 'weightage') ?>

    <?php // echo $form->field($model, 'opening_stock') ?>

    <?php // echo $form->field($model, 'standard_rate') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php // Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
