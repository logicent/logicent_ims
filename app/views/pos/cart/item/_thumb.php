<div class="row">
<?php

use yii\helpers\Html;

if (!empty($items)) :
    foreach ($items as $id => $item) : ?>
    <div class="six wide column">
        <div class="thumbnail">
        <?php 
            $img_path = Html::getAttributeValue($pos_invoice_item, 'image_path') ?>
            <img src="<?= empty($img_path) ? 'images/image-ph.jpg' : $img_path ?>" alt="..." class="">
            <div class="caption">
                <h5><?= Html::getAttributeValue($pos_invoice_item, 'item_name') ?></h5>
                <p class="small text-muted"><?= Html::getAttributeValue($pos_invoice_item, 'description') ?></p>
                <!-- <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p> -->
            </div>
        </div>
    </div>
<?php 
    endforeach;
endif ?>
</div>
