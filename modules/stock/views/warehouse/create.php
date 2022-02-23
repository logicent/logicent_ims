<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Warehouse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Warehouse'), 'url' => ['index']];

?>

<div class="warehouse-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
