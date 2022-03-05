<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salary Slips'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['read', 'id' => $model->id]];
?>

<div class="salary-slip-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
