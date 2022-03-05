<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salary Components'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['read', 'id' => $model->id]];
?>

<div class="salary-component-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
