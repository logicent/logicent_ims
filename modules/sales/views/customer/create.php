<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Customer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer'), 'url' => ['index']];
?>

<div class="customer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
