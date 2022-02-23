<?php

use app\assets\FlatpickrAsset;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
// use app\models\sales\SalesQuoteItem;

FlatpickrAsset::register($this);

$this->title = $model->customer_name;
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selling'), 'url' => ['selling']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Quote'), 'url' => ['index']];

?>

<div class="sales-quote-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>