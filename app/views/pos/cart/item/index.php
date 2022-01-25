<div id="list" class="tab-pane fade">
    <?= $this->render('list', array('pos_invoice_items' => $pos_invoice_item)) ?>
</div>
<div id="grid" class="tab-pane fade">
    <?= $this->render('grid', array('pos_invoice_items' => $pos_invoice_item)) ?>
</div>