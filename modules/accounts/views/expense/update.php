<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense'), 'url' => ['/accounts/expense']];
?>

<div class="expense-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
