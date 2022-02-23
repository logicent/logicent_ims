<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Item Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['module/stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Group'), 'url' => ['index']];
?>

<div class="stock-item-group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
