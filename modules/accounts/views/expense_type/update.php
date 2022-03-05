<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense Type'), 'url' => ['/accounts/expense-type']];
?>

<div class="expense-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
