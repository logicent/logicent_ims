<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Warehouse'), 'url' => ['index']];
?>

<div class="warehouse-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
