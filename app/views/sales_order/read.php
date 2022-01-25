<?php

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Order'), 'url' => ['index']];

?>

<div class="sales-order-readonly">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>