$('#pos__payment_detail').on('click', 'td.amount-paid > input', 
	function(e) {
		$(this).select();
	});

$('#pos__payment_detail').on('focusout', 'td.amount-paid > input', 
	function(e) {
		if ($(this).val() == '')
			$(this).val('0.00');
	});

$('.payment-options').on('click',
	function(e) {
		$('#payment_options').toggle();
		el_icon = $(this).find('i');

		el_icon.toggleClass('right');
		el_icon.toggleClass('down');
	});

// fetch edited line payment detail to update totals if amount changes
$('#pos__payment_detail').on('change', 'td.amount-paid > input', 
	function(e) {
		if ($(this).val() == '')
			return false;

		// lineInputs = getLineInputs($(this));
		paidInputs = getPaymentInputs();
		cartTotalInputs = getCartTotalInputs();

		recalculateCartTotals(paidInputs, cartTotalInputs);
	});

function getPaymentInputs() 
{
	el_tbody = $('#pos__payment_detail');

	el_payment_amount_paid = el_tbody.find('td.amount-paid > input');
	// el_payment_amount_paid_display = el_tbody.find('td.amount-paid > span');

	return [
		el_payment_amount_paid, 
		// el_payment_amount_paid_display
	];
}

// Fetch the Cart summary inputs/labels
function getCartTotalInputs() 
{
	el_tbody = $('#cart_summary');

	el_amount_due = $('#pos__total_amount');
	el_amount_paid = $('#pos__paid_amount');
	el_change_due = $('#pos__change_amount');
	el_balance_due = $('#pos__balance_amount');

	el_paid_display = el_tbody.find('#cart_paid_amount');
	el_change_display = el_tbody.find('#cart_change_amount');
	el_balance_display = el_tbody.find('#cart_balance_amount');

	return [
		el_amount_due,
		el_amount_paid,
		el_change_due,
		el_balance_due,
		el_paid_display,
		el_change_display,
		el_balance_display
	];
}

// Re-calculate the Cart summary totals
function recalculateCartTotals(paidInputs, cartTotals)
{
	sum_paid_total = 0;
	rowCount = -1; // offset to start at 0
	paidInputs[0].each(
		function() {
			rowCount += 1;
			paid_total = parseFloat($(this).val());
			if (isNaN(paid_total))
				paid_total = 0;
			else
				sum_paid_total += paid_total;
		});

	// amount_paid
	cartTotals[1].val(sum_paid_total.toFixed(2));
	// change_due = amount_paid - amount_due
	cartTotals[2].val(parseFloat(cartTotals[1].val()) - parseFloat(cartTotals[0].val()));
	// balance_due = amount_due - amount_paid
	cartTotals[3].val(parseFloat(cartTotals[0].val()) - parseFloat(cartTotals[1].val()));
	// balance_due = (-amount_paid)
    if ($('#pos__saleType').val() == 'Return')
	    cartTotals[3].val(-parseFloat(cartTotals[1].val()));
	// amount paid display
	cartTotals[4].text(cartTotals[1].val());
	// change display
	cartTotals[5].text(cartTotals[2].val());
	// balance display
	cartTotals[6].text(cartTotals[3].val());
}