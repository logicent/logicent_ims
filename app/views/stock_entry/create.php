<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Stock Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock Entry'), 'url' => ['index']];

?>

<div class="stock-entry-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
