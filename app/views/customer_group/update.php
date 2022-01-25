<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Group'), 'url' => ['index']];
?>

<div class="customer-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
