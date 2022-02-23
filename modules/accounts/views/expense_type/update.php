<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense Type'), 'url' => ['index']];
?>

<div class="expense-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
