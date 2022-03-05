<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Order'), 'url' => ['index']];

?>

<div class="work-order-update">

    <?= $this->render('_form', [
        'model' => $model,
        'productDataProvider' => $productDataProvider
    ]) ?>

</div>
