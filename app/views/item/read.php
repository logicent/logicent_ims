<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item'), 'url' => ['index']];
?>

<div class="item-read">

    <?= $this->render('_form', [
        'model' => $model
]) ?>

</div>
