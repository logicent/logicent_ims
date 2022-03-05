<?php

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

echo $this->render('_form', ['model' => $model]);

$this->registerJs(<<<JS
    // console.log();
    // $('.column').addClass('ui transparent input');
JS
) ?>
