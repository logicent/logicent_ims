<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Sales Quote');
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selling'), 'url' => ['selling']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Quote'), 'url' => ['index']];
?>

<div class="sales-quote-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
