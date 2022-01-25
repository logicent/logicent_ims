<?php

// TO-DO: title as New Sale or Sale #{posReceiptId}
$this->title = Yii::t('app', 'Sales');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/pos']];

?>

<div id="pos_page" style="margin-top: -40px;">
    <?= $this->render('cart/index', [
            'pos_profile' => $this->context->model->posProfile,
            'pos_receipt' => $this->context->model,
            'pos_receipt_item' => $this->context->detailModels['pos_receipt_item'],
            'pos_receipt_payment' => $this->context->detailModels['pos_receipt_payment']
        ]) ?>
</div>