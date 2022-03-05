<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Stages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['read', 'id' => $model->id]];
?>

<div class="production-stage-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
