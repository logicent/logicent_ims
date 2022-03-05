<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Salary Component');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salary Component'), 'url' => ['index']];

?>

<div class="salary-component-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
