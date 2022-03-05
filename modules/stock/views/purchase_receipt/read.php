<?php

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->doctype_name), 'url' => ['index']]; ?>

<?= $this->render('_form', [
    'model' => $model
]); ?>

<?php $this->registerJs(<<<JS
    // console.log();
    $('.ui.column.grid > .column').addClass('ui transparent input');
JS
) ?>
