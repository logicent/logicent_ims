<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<tr id="item_<?= $rowId ?>">
	<td class="center aligned">
		<?= Html::a(Elements::icon('grey trash alternate outline'), null, [
				'class' => 'del-item compact ui basic icon button',
				'style' => 'margin: 0em;'
			]) ?>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]id", ['class' => 'item-id']); ?>
	</td>
	<td class="item" style="vertical-align: middle">
		<div class="ten wide column item item-name">
			<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]description", ['class' => 'item-description']); ?>
			<?= strtoupper($pos_receipt_item->item_name) ?>&emsp;
			<div class="text-muted qty-in-stock" style="float: right;">(<?= $stock_item->qty_in_stock ?>)</div>
			<div class="text-muted">#<?= strtoupper($pos_receipt_item->item_id) ?></div>
		</div>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]item_id"); ?>
	</td>
	<td class="qty" style="padding: 0px">
		<?= Html::activeTextInput($pos_receipt_item, "[$rowId]quantity", [
				'value' => number_format($pos_receipt_item->quantity, 0, '.', ''),
				'style' => 'border: none; border-radius: 0px; height: 54px'
			]) ?>
	</td>
	<td class="price" style="padding: 0px">
		<?= Html::activeTextInput($pos_receipt_item, "[$rowId]unit_price", [ 
				'class' => 'unit-price right aligned',
				'value' => number_format($pos_receipt_item->unit_price, 2, '.', ''),
				'style' => 'border: none; border-radius: 0px; height: 54px',
				'readonly' => !(bool) $pos_profile->allow_user_price_edit
			]) ?>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]tax_percent", [
				'class' => 'tax-percent'
			]) ?>
	</td>
	<?php if ((bool) $pos_profile->show_discount) : ?>
	<td class='discount'>
		<?= Html::activeTextInput($pos_receipt_item, "[$rowId]discount_amount", [ 
				'value' => number_format($pos_receipt_item->discount_amount, 0.0, '.', ''),
				'class' => 'right aligned',
				'style' => 'padding: 0.4em;',
				'readonly' => (bool) $pos_profile->allow_user_discount_edit === false
			]) ?>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]discount_percent", ['value' => number_format($pos_receipt_item->discount_percent, 0, '.', '')]); ?>
	</td>
	<?php else : ?>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]discount_amount", [ 
				'value' => number_format($pos_receipt_item->discount_amount, 0.0, '.', '')]
			) ?>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]discount_percent", [ 
				'value' => number_format($pos_receipt_item->discount_percent, 0, '.', '')]
			) ?>
	<?php endif ?>
	<td class='item-total right aligned' style="vertical-align: middle; padding-right: 10px; font-size: 105%;">
		<span><?= number_format($pos_receipt_item->total_amount, 2) ?></span>
		<?= Html::activeHiddenInput($pos_receipt_item, "[$rowId]total_amount"); ?>
	</td>
</tr>
