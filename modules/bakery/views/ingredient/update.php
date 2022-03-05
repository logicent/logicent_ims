<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredient'), 'url' => ['index']];
?>

<div class="ingredient-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
