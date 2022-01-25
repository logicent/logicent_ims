<?php

use yii\helpers\Url;

?>
<!-- Item list -->
<?= $this->render('item/list', ['model' => $model, 'form' => $form]) ?>

<!-- Document totals -->
<?= $this->render('item/doc_total', ['model' => $model, 'form' => $form]) ?>

<?php
$params = [
    'formId' => strtolower($model->formName()),

    'section' => '#_item',
    'table' => '#_item table',
    'addItemUrl' => Url::to(['add-item']),
    'editItemUrl' => Url::to(['edit-item']),
    'getItemUrl' => Url::to(['get-item']),
    'deleteItemUrl' => Url::to(['delete-item']),
];

$this->registerJs(
    "var itemDoc = "  . \yii\helpers\Json::htmlEncode($params) . ";",
    $this::POS_HEAD,
    'itemDoc'
);

$this->registerJs($this->render('item/list.js'));
?>