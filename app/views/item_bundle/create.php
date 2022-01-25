<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Item Bundle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Bundle'), 'url' => ['index']];
?>

<div class="item-bundle-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
