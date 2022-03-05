<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Payroll Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payroll Entry'), 'url' => ['index']];

?>

<div class="payroll-entry-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
