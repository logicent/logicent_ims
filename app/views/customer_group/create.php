<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Customer Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Group'), 'url' => ['index']];
?>

<div class="customer-group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
