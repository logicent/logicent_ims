<!-- fixed single line  -->
<table id="cart_items" class="ui very compact celled table" style="font-size: 125%">
	<thead>
		<tr class="ui sub header">
			<th class="one wide"></th>
			<th class="<?= ((bool) $pos_profile->show_discount ? 'five' : 'seven') ?> wide text-muted">
				<?= Yii::t('app', 'ITEM') ?>
			</th>
			<th class="two wide text-muted">
				<?= Yii::t('app', 'QTY') ?>
			</th>
			<th class="three wide right aligned text-muted">
				<?= Yii::t('app', 'PRICE') ?>
			</th>
			<?php if ((bool) $pos_profile->show_discount) : ?>
			<th class="two wide text-muted">
				<?= Yii::t('app', 'DISCOUNT') ?>
			</th>
			<?php endif ?>
			<th class="three wide right aligned text-muted">
				<?= Yii::t('app', 'AMOUNT') ?>
			</th>
		</tr>
	</thead>
	<tbody id="cart_detail">
<?php
	if ($pos_receipt_items) :
		foreach ($pos_receipt_items as $rowId => $pos_receipt_item) :
			echo $this->render('_form', [
							'pos_receipt_item' => $pos_receipt_item,
							'pos_profile' => $pos_profile,
							'rowId' => $rowId
				]);
		endforeach;
	else :
		echo $this->render('_no_item', [
			'pos_profile' => $pos_profile
		]);
	endif ?>
	</tbody>
</table>
<?php $this->registerJs( $this->render('list.js') ) ?>
