<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Person'), 'url' => ['index']];
?>

<div class="sales-person-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
