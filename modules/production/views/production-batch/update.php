<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Batches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['read', 'id' => $model->id]];
?>

<div class="production-batch-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
