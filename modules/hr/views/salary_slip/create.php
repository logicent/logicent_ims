<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Salary Slip');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salary Slip'), 'url' => ['index']];

?>

<div class="salary-slip-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
