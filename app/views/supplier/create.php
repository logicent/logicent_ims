<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Supplier');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Supplier'), 'url' => ['index']];
?>

<div class="supplier-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
