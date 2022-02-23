<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item'), 'url' => ['index']];
?>

<div class="item-create">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
