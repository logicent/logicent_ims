<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Sales Invoice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Invoice'), 'url' => ['index']];
?>

<div class="sales-invoice-create">

    <?= $this->render('_form', [
            'model' => $model
        ]) ?>

</div>