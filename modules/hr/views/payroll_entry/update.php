<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payroll Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['read', 'id' => $model->id]];
?>

<div class="payroll-entry-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
