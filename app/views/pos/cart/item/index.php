<?php

use app\enums\Item_View;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<div id="item_view" class="ui basic buttons">
<?php
    $active = $pos_profile->default_item_view == Item_View::List ? 'active' : null;
    echo Html::a(Elements::icon('th list', ['style' => 'color: #8D99A6']), '#item_list',  [
            'class' => "text-muted ui large icon button {$active}",
            'style' => 'padding: 0.58em;',
            'title' => 'List', 
            'data-tab' => 'list'
    ]);
    $active = $pos_profile->default_item_view == Item_View::Image ? 'active' : null;
    echo Html::a(Elements::icon('th grid', ['style' => 'color: #8D99A6']), '#item_grid', [
            'class' => "text-muted ui large icon button {$active}",
            'style' => 'padding: 0.58em;',
            'title' => 'Image',
            'data-tab' => 'grid'
        ]) ?>
</div>
<?php
$active = $pos_profile->default_item_view == Item_View::List ? 'active' : null ?>

<div id="item_list" class="ui tab <?= $active ?>" data-tab="list" style="margin: 1.25em 0em;">
    <?= $this->render('list', [
            'pos_profile' => $pos_profile,
            'pos_receipt_items' => $pos_receipt_items,
        ]) ?>
</div>
<?php
$active = $pos_profile->default_item_view == Item_View::Image ? 'active' : null ?>

<div id="item_grid" class="ui tab <?= $active ?>" data-tab="grid" style="margin: 1.25em 0em;">
    <?= $this->render('grid', [
            'pos_profile' => $pos_profile,
            'pos_receipt_items' => $pos_receipt_items,
        ]) ?>
</div>
<?php
// $this->registerJS(<<<JS
//     $('#item_view > .ui.button').on('click', function() {
//         // switch cart item view
//         $.tab('change tab', $(this).data('tab'));
//     });
// JS);