<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Supplier Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Supplier Group'), 'url' => ['index']];
?>

<div class="supplier-group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
