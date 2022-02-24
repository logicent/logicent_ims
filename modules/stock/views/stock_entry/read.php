<?php

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock Entry'), 'url' => ['index']];

echo $this->render('_form', [
    'model' => $model
]);

$this->registerJs(<<<JS
    // console.log();
    $('.ui.column.grid > .column').addClass('ui transparent input');
JS
) ?>