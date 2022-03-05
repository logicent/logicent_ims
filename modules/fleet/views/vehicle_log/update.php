<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Log'), 'url' => ['index']];
?>

<div class="vehicle-log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
