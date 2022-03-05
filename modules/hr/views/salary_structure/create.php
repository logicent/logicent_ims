<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Salary Structure');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salary Structure'), 'url' => ['index']];

?>

<div class="salary-structure-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
