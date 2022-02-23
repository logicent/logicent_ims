<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Bundle'), 'url' => ['index']];
?>

<div class="item-bundle-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
