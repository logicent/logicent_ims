<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brand'), 'url' => ['index']];
?>

<div class="brand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
