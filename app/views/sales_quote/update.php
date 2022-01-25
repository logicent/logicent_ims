<?php

use yii\helpers\Html;

$this->title = $model->customer_name;
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selling'), 'url' => ['selling']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Quote'), 'url' => ['index']];
?>

<div class="sales-quote-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
