<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->docTypeName), 'url' => ['index']];

echo $this->render('_form', [
    'model' => $model
]);

$this->registerJs(<<<JS
    // console.log();
    $('.ui.column.grid > .column').addClass('ui transparent input');
JS
) ?>
