<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Work Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Order'), 'url' => ['index']];

?>

<div class="work-order-create">

    <?= $this->render('_form', [
        'model' => $model,
        'productDataProvider' => $productDataProvider
    ]) ?>

</div>
