<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense'), 'url' => ['index']];
?>

<div class="expense-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
