<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Purchase Invoice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Invoice'), 'url' => ['index']];
?>

<div class="purchase-invoice-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
