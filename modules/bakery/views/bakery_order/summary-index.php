<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

use Zelenin\yii\SemanticUI\widgets\GridView;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

$this->title = Inflector::camel2words(
                    Inflector::id2camel(
                        StringHelper::basename($this->context->action->id)
                ));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bakery Order'), 'url' => ['index']];

echo GridView::widget([
    'layout' => "{items}\n{summary}\n{pager}",
    'dataProvider' => $dataProvider,
]); ?>