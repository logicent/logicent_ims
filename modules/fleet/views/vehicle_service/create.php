<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Vehicle Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Service'), 'url' => ['index']];

?>

<div class="vehicle-service-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
