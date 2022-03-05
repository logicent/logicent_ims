<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Employee Timesheet');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

?>

<div class="employee-timesheet-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
