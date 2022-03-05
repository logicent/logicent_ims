<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product'), 'url' => ['index']];
?>

<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'bakeryCost' => $bakeryCost,
    ]) ?>

</div>
