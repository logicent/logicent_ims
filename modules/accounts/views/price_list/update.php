<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Price List'), 'url' => ['index']];
?>

<div class="price-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
