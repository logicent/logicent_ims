<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Group'), 'url' => ['/sales/customer-group']];
?>

<div class="customer-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
