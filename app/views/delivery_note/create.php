<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Delivery Note');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Delivery Note'), 'url' => ['index']];

?>

<div class="delivery-note-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
