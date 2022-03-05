<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Customer Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Group'), 'url' => ['/sales/customer-group']];
?>

<div class="customer-group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
