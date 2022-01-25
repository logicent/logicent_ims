<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Supplier'), 'url' => ['index']];
?>

<div class="supplier-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
