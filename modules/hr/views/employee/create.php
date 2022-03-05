<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Employee');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

?>

<div class="employee-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
