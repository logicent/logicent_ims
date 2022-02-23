<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Supplier Group'), 'url' => ['index']];
?>

<div class="supplier-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
