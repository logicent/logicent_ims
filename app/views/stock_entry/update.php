<?php

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock Entry'), 'url' => ['index']];
?>

<div class="stock-entry-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
