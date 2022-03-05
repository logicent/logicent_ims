<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Service'), 'url' => ['index']];
?>

<div class="vehicle-service-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
