<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Vehicle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->docTypeName), 'url' => ['index']]; 

?>

<div class="vehicle-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
