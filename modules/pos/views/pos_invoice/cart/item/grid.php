<div id="cart_images" class="ui four column stackable grid">
<?php
    if ($pos_receipt_items) :
        foreach ($pos_receipt_items as $row_id => $item) : 
            echo $this->render('_image', ['item' => $item]);
        endforeach;
    else :
        echo $this->render('_no_image', [
            // 'pos_profile' => $pos_profile
        ]);
    endif ?>
</div>