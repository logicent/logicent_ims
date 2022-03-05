<?php

// To-Do: title as New Sale or Sale #{posReceiptId}
$this->title = Yii::t('app', 'POS');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'POS'), 'url' => ['/pos']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Sale'), 'url' => false];

?>

<div id="pos_page" style="margin-top: -56px;">
    <?= $this->render('cart/index', [
            'pos_profile' => $this->context->model->posProfile,
            'pos_receipt' => $this->context->model,
            'pos_receipt_item' => $this->context->detailModels['pos_receipt_item'],
            'pos_receipt_payment' => $this->context->detailModels['pos_receipt_payment']
        ]) ?>
</div>