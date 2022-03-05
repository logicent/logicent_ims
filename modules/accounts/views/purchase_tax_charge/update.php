<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Tax Charge'), 'url' => ['/accounts/purchase-tax-charge']];
?>

<div class="tax-charge-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
