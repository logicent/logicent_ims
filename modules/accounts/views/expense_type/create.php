<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Expense Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense Type'), 'url' => ['index']];
?>

<div class="expense-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
