<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer'), 'url' => ['index']];
?>

<div class="customer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
