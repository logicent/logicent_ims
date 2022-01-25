<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New UoM');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'UoM'), 'url' => ['index']];

?>

<div class="uom-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
