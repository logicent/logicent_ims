<?php

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer'), 'url' => ['/sales/customer']];
?>

<div class="customer-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>