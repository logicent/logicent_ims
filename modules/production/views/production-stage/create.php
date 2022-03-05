<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Production Stage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Stage'), 'url' => ['index']];

?>

<div class="production-stage-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
