<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leave Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['read', 'id' => $model->id]];
?>

<div class="leave-application-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
