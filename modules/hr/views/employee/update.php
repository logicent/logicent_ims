<?php

use yii\helpers\Html;

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

?>

<div class="employee-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
