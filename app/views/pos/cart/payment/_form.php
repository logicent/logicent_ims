<?php

use app\enums\Status_Payment;
use yii\helpers\Html;

?>
<tr id="payment_<?= $rowId ?>">
	<td class="eight wide">
		<label for="<?= "[$rowId]paid_amount" ?>"><?= $paymentMethod ?></label>
		<?= Html::activeHiddenInput($pos_receipt_payment, "[$rowId]payment_method", ['value' => $pos_receipt_payment->isNewRecord ? $paymentMethod : $pos_receipt_payment->payment_method]) ?>
		<?= Html::activeHiddenInput($pos_receipt_payment, "[$rowId]id", ['value' => $pos_receipt_payment->id]) ?>
		<?= Html::activeHiddenInput($pos_receipt_payment, "[$rowId]status", ['value' => Status_Payment::Paid]) ?>
		<?= Html::activeHiddenInput($pos_receipt_payment, "[$rowId]paid_at", ['value' => date('Y-m-d H:i:s')]) ?>
		<?= Html::activeHiddenInput($pos_receipt_payment, "[$rowId]created_by", ['value' => $pos_receipt_payment->created_by]) ?>
	</td>
	<td class="right aligned eight wide amount-paid" colspan="2">
		<?= Html::activeTextInput($pos_receipt_payment, "[$rowId]paid_amount", [
				'class' => 'right aligned payment-entry',
				'value' => '0.00',
				'id' => "[$rowId]paid_amount"
			]) ?>
	</td>
</tr>
