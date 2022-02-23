<?php

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer'), 'url' => ['index']];
?>

<div class="customer-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>