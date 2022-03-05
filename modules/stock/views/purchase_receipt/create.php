<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Purchase Receipt');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Receipt'), 'url' => ['index']];

?>

<div class="purchase-receipt-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
