$('tbody#cart_detail').on('click', 'td.qty > input, td.price > input.unit-price, td.discount > input', 
    function(e) {
        $(this).select();
    });

$('tbody#cart_detail').on('focusout', 'td.qty > input', 
	function(e) {
        qty = parseFloat($(this).val());
		if (qty == 0 || isNaN(qty))
            $(this).val('1');
	});

// fetch edited line item detail to update totals if qty/price/discount changes
$('tbody#cart_detail').on('change', 'td.qty > input, td.price > input.unit-price, td.discount > input', 
    function(e) {
        rowId = $(this).closest('tr').attr('id');

        qty = parseFloat($(this).val());
        if (qty == 0 || isNaN(qty))
            $(this).val('1');

        lineInputs = getLineInputs($(this));
        linesInputs = getLinesInputs();
        docTotalInputs = getDocTotalInputs();

        lineInputs[4].val(lineInputs[0].val() * lineInputs[1].val());
        lineInputs[5].text(lineInputs[4].val());

        recalculateDocTotals(linesInputs, docTotalInputs);
        refreshImageDisplayValues(rowId, lineInputs);
    });

function refreshImageDisplayValues(rowId, lineInputs)
{
    el_image = $('div#cart_images').find('div#' + rowId);

    el_image.find('span.qty').text(lineInputs[0].val());
    el_image.find('span.price').text(lineInputs[1].val());
    el_image.find('span.item-total').text(lineInputs[4].val());
}

function getLinesInputs() 
{
    el_tbody = $('tbody#cart_detail');

    el_item_description = el_tbody.find('td.item > input.item-description');
    el_item_qty = el_tbody.find('td.qty > input');
    el_item_price = el_tbody.find('td.price > input.unit-price');
    el_item_discount = el_tbody.find('td.discount > input');
    el_item_tax = el_tbody.find('td.price > input.tax-percent');
    el_item_total = el_tbody.find('td.item-total > input');

    el_item_total_display = el_tbody.find('td.item-total > span');

    return [
        el_item_qty,
        el_item_price,
        el_item_tax,
        el_item_discount,
        el_item_total,
        el_item_total_display,
        el_item_description
    ];
}

function getLineInputs(el) 
{
    el_table_row = el.closest('tr');
    el_item_description = el_table_row.find('td.item > input.item-description');
    el_item_qty = el_table_row.find('td.qty > input');
    el_item_price = el_table_row.find('td.price > input.unit-price');
    el_item_discount = el_table_row.find('td.discount > input');
    el_item_tax = el_table_row.find('td.price > input.tax-percent');
    el_item_total = el_table_row.find('td.item-total > input');

    el_item_total_display = el_table_row.find('td.item-total > span');

    return [
        el_item_qty, 
        el_item_price, 
        el_item_tax, 
        el_item_discount, 
        el_item_total, 
        el_item_total_display, 
        el_item_description
    ];
}

// Re-calculate the Line item total
function recalculateLineTotal(line, item, lineTotalDisplay) 
{
    line.val(
        (item.unit_price * item.quantity).toFixed(2)
    );

    lineTotalDisplay.text(line.val());
}

// Fetch the Sale summary inputs/labels
function getDocTotalInputs() 
{
    el_tfoot = $('#cart_summary');
    el_subtotal = el_tfoot.find('#cart_net_total');
    el_discount = el_tfoot.find('#cart_discount');
    el_taxtotal = el_tfoot.find('#cart_tax_amount');
    el_total = el_tfoot.find('#cart_total_amount');

    return [
        el_subtotal,
        el_discount,
        el_taxtotal,
        el_total
    ];
}

// Re-calculate the Sale summary totals
function recalculateDocTotals(linesInputs, docTotals) 
{
    sum_line_total = sum_discount_amount = sum_tax_amount = 0;
    rowCount = -1; // offset to start at 0
    linesInputs[4].each(
        function() {
            rowCount += 1;
            line_total = $(this).val();
            if (line_total == '')
                return false;
            sum_line_total += parseFloat(line_total);

            // discount_amount = line_total * item.disc_percent / (1 + item.disc_percent);
            // sum_discount_amount += parseFloat(discount_amount);

            taxRate = linesInputs[2][rowCount]['value'];
            // // skip tax calc if value is null
            if (taxRate)
            {
                tax_amount = line_total * taxRate / (1 + taxRate);
                sum_tax_amount += parseFloat(tax_amount);
            }
        });

    docTotals[0].text(sum_line_total); // net_total
    // docTotals[1].text(sum_discount_total); // discount
    docTotals[2].text(sum_tax_amount); // tax
    docTotals[3].text(sum_line_total); // total

    // $('#cart_discount_amount').val(sum_discount_amount.toFixed(2));
    $('#cart_net_total').text(sum_line_total.toFixed(2));
    $('#cart_tax_amount').text(sum_tax_amount.toFixed(2));
    $('#cart_total_amount').text(sum_line_total.toFixed(2));

    $('#pos__net_total').val(sum_line_total.toFixed(4));
    $('#pos__tax_amount').val(sum_tax_amount.toFixed(4));
    $('#pos__total_amount').val(sum_line_total.toFixed(4));

    balanceDue = Number($('#cart_total_amount').text()) - Number($('#cart_paid_amount').text());
    $('#cart_balance_amount').text(balanceDue.toFixed(2));
    $('#pos__balance_amount').val(balanceDue.toFixed(4));
}

$('#cart_detail').on('click', '.del-item', 
function(e) {
    el_table_body = $('#cart_items').find('tbody')
    el_table_row = $(this).closest('tr');
    el_table_row_id = el_table_row.attr('id');
    el_table_row.remove();

    el_image = $('#cart_images').find('div#' + el_table_row_id);
    el_image.remove();

    rowCount = el_table_body.find('tr').length;
    if (rowCount == 0) { //  then append #no_items and set .payment-entry as readonly
        $.ajax({
            type: 'post',
            url: '/pos/delete-cart-item',
            data: {
            },
            success: function(no_item) 
            {
                el_table_body.append(no_item);
                $('#cancel_sale__btn').addClass('disabled');
                $('#cancel_sale__btn').removeClass('red');
                $('.payment-entry').each(function() {
                    $(this).val('');
                    $(this).attr('readonly', true);
                    $('#sales_change_amount').text('');
                    $('#pos__change_amount').val('');
                });
                $('#pos__item-search').focus();
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        });
    }

    // update sale_total amounts
    lineInputs = getLineInputs(el_table_body);
    linesInputs = getLinesInputs();
    docTotalInputs = getDocTotalInputs();
    lineInputs[4].val(lineInputs[0].val() * lineInputs[1].val());
    lineInputs[5].text(lineInputs[4].val());
    recalculateDocTotals(linesInputs, docTotalInputs);

    $('#pos__item-search').focus();

    // stops execution
    return false;
});