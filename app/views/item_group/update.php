<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Group'), 'url' => ['index']];
?>

<div class="stock-item-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
