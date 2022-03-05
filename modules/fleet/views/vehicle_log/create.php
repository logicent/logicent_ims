<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Vehicle Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Log'), 'url' => ['index']];

?>

<div class="vehicle-log-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
