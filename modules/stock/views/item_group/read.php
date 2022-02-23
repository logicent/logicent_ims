<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Group'), 'url' => ['index']];
?>

<div class="stock-item-group-view">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
