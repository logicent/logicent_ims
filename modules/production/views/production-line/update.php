<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Line'), 'url' => ['index']];
?>

<div class="production-line-update">

    <?= $this->render('_form', [
        'model' => $model,
        'lineStageDataProvider' => $lineStageDataProvider        
    ]) ?>

</div>
