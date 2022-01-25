<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Branch');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Branch'), 'url' => ['index']];
?>

<div class="branch-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
