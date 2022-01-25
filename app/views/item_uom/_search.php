<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<div class="uom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'updated_by') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'doc_status') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'parent_field') ?>

    <?php // echo $form->field($model, 'parent_doctype') ?>

    <?php // echo $form->field($model, 'idx') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, 'must_be_whole_number') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
