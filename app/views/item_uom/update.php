<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'UoM'), 'url' => ['index']];
?>

<div class="uom-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
