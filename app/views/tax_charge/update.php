<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tax Charge'), 'url' => ['index']];
?>

<div class="tax-charge-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
