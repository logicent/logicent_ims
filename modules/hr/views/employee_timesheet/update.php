<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

?>

<div class="employee-timesheet-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
