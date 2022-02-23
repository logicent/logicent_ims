<?php

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Invoice'), 'url' => ['index']];

?>

<div class="sales-invoice-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>