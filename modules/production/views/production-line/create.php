<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Production Line');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Line'), 'url' => ['index']];

?>

<div class="production-line-create">

    <?= $this->render('_form', [
        'model' => $model,
        'lineStageDataProvider' => $lineStageDataProvider
    ]) ?>

</div>
