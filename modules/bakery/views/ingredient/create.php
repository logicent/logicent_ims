<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Ingredient');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredient'), 'url' => ['index']];
?>

<div class="ingredient-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
