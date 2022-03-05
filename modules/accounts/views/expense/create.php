<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Expense');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense'), 'url' => ['/accounts/expense']];
?>

<div class="expense-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
