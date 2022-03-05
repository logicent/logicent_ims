<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->docTypeName), 'url' => ['index']]; 
?>

<div class="vehicle-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
