<div id="item_<?= $rowId ?>" class="four wide column center aligned">
<?php
    $img_path = Yii::getAlias('@web/uploads/') . $stock_item->image_path ?>
    <img src="<?= !empty($stock_item->image_path) ? $img_path  : '/img/image-ph-220.jpg' ?>" alt="..." class="ui image">
    <div class="ui small header text-muted">
        <?= $stock_item->name . '&nbsp;(' . $stock_item->qty_in_stock . ')' ?>
    </div>
    <div class="text-muted" style="font-size: 115%">
        x <span class="qty"><?= $pos_receipt_item->quantity ?></span>
        @<span class="price"><?= $pos_receipt_item->unit_price ?></span><br>
        <span class="item-total"><b><?= $pos_receipt_item->total_amount ?></b></span>
    </p>
</div>