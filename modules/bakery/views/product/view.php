<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product'), 'url' => ['index']];
?>

<div class="product-view">

    <?= $this->render('_form', [
        'model' => $model,
        // 'bakeryCost' => $bakeryCost,
]) ?>

</div>
