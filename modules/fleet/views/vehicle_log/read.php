<?php

$this->title = $model->vehicle->license_plate;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fleet'), 'url' => ['modules/catalog', 'id' => 'fleet']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->docTypeName), 'url' => ['index']]; ?>

<?= $this->render('_form', [
    'model' => $model
]); ?>

<?php $this->registerJs(<<<JS
    // console.log();
    $('.ui.column.grid > .column').addClass('ui transparent input');
JS
) ?>
