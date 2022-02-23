<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Expense');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expense'), 'url' => ['index']];
?>

<div class="expense-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
