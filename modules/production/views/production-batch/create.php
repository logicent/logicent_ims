<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Production Batch');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Batch'), 'url' => ['index']];

?>

<div class="production-batch-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
