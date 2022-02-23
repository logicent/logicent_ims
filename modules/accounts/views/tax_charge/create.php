<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Tax Charge');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tax Charge'), 'url' => ['index']];
?>

<div class="tax-charge-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
