<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Employee Attendance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

?>

<div class="employee-attendance-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
