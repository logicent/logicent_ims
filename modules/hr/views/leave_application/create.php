<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Leave Application');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leave Application'), 'url' => ['index']];

?>

<div class="leave-application-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
