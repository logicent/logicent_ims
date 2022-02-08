$(itemDoc.table).on('click', '.edit-item--btn',
    function (e) {
        el_edit_btn = $(this);
        rowInputs = $(this).parent('td').parent('tr').children('td').children('input');
        el_table_row = $(this).closest('tr');
        el_id = el_table_row.find('td.select-row');
        // formData = $('#content .ui.form');
        // formData = new FormData(formData);

        $.ajax({
            url: 'edit-item',
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'modelId': $(this).data('model-id'),
                'formView': $(this).data('form-view'),
                'formData': rowInputs.serializeArray(),
                'rowId': el_id.text(),
            },
            success: function( response )
            {
                $('#item__modal .content').html( response ); // Target '.content' to keep close button in modal
                $('#item__modal').modal({ 
                                        centered: false,
                                        closable : false 
                                    })
                                    .modal('show'); // !!! Use the modal#id not '.ui.modal' to avoid load issues
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });

        return false;
    });

$(itemDoc.table + ' tbody').on('click', 'input.pikadaytime',
    function(e) {
        $(this).flatpickr({
            // hourIncrement : 1,
            minuteIncrement: 15,
            enableTime: true
        });
    });

$(itemDoc.section + ' .add-row').on('click',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution
        el_table_body = $(itemDoc.table + ' tbody');
        has_no_data = el_table_body.find('tr#no_data').length == 1;
        if (has_no_data)
            el_table_body.find('tr#no_data').hide();

        $.ajax({
            url: itemDoc.addItemUrl,
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'itemModelClass': null, // Item
                'formView': $(this).data('form-view'),
                'nextRowId': el_table_body.find('tr').not('#no_data').length + 1
            },
            success: function(response) {
                el_table_body.append(response);

                $('#submit_btn').hide();
                $('#save_btn').show();

                rowCount = el_table_body.find('tr').not('#no_data').length;
                displaySelectAllCheckboxIf(rowCount);
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$(itemDoc.table + ' tbody').on('change', 'select.list-option',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        el_table_row = $(this).closest('tr');
        el_input_item_qty = el_table_row.find('td.item-qty > input');
        el_input_item_rate = el_table_row.find('td.item-rate > input');
        el_input_item_tax = el_table_row.find('td.item-tax > input');
        el_input_item_total = el_table_row.find('td.item-total > input');

        $.ajax({
            url: itemDoc.getItemUrl,
            type: 'get',
            data: {
                'item_id': $(this).val()
            },
            success: function(item) {
                // Re-calculate the Line item totals
                el_input_item_qty.val(item.min_order_qty); // default is 1
                el_input_item_rate.val(item.standard_rate);
                el_input_item_tax.val(item.tax_rate);
                el_input_item_total.val(item.standard_rate * item.min_order_qty);

                // Re-calculate the Document totals
                recalculateDocumentTotals();
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$(itemDoc.table + ' tbody').on('change',
        'td.item-qty > input, td.item-rate > input, td.item-discount > input, td.item-tax > input',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        el_table_row = $(this).closest('tr');
        el_input_item_qty = el_table_row.find('td.item-qty > input');
        el_input_item_rate = el_table_row.find('td.item-rate > input');
        el_input_item_tax = el_table_row.find('td.item-tax > input');
        el_input_item_total = el_table_row.find('td.item-total > input');
        el_input_item_total.val(el_input_item_rate.val() * el_input_item_qty.val());

        // Re-calculate the Document totals
        recalculateDocumentTotals();
    });

$(itemDoc.table).on('click',  'th.select-all-rows > .ui.checkbox',
    function(e) {
        select_all_rows = $(this).find('input').is(':checked');
        all_rows = $(itemDoc.table + ' tbody').find('td.select-row input');
        del_row = $(itemDoc.section + ' .del-row');

        if (select_all_rows) {
            del_row.show();
            all_rows.each(
                function (e) {
                    $(this).prop('checked', true);
                }
            );
        }
        else {
            del_row.hide();
            all_rows.each(
                function (e) {
                    $(this).prop('checked', false);
                }
            );
        }
    });

$(itemDoc.table + ' tbody').on('click', 'td.select-row > .ui.checkbox',
    function(e) {
        select_all_rows = $(itemDoc.table + ' thead').find('.select-all-rows > .ui.checkbox > input');
        all_rows = $(itemDoc.table + ' tbody').find('input:checkbox').length;
        selected_rows = $(itemDoc.table + ' tbody').find('input:checked').length;
        del_row = $(itemDoc.section + ' .del-row');

        if (selected_rows == 0) {
            select_all_rows.prop('checked', false);
            del_row.hide();
        }
        else
            del_row.show();

        if (selected_rows < all_rows)
            select_all_rows.prop('checked', false);
        else
            select_all_rows.prop('checked', true);
    });

$(itemDoc.section + ' .del-row').on('click',
    function(e) {
        $(this).css('display', 'none');
        modelClass = $(this).data('model-class');
        selectedRows = $(itemDoc.table + ' td.select-row > .ui.checkbox > input:checked');

        selectedRows.each(
            function(e) {
                el_table_row = $(this).closest('tr');
                el_id = el_table_row.find('td.select-row > input.row-id');

                if (el_id.val() !== '')
                    $.ajax({
                        url: itemDoc.deleteItemUrl,
                        type: 'post',
                        data: {
                            _csrf: yii.getCsrfToken(),
                            'modelId': el_id.val(),
                            'modelType': 'Item'
                        },
                        success: function(response) {
                        },
                        error: function(jqXhr, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                el_table_row.remove();
            });
        rowCount = $(itemDoc.table + ' tbody > tr').not('#no_data').length;
        if (rowCount == 0) {
            $('tr#no_data').show();
            el_checkbox_all = $(itemDoc.table + ' th.select-all-rows input');
            el_checkbox_all.prop('checked', false);

            if (rowCount > 0)
                el_checkbox_all.parent('.ui.checkbox').css('display', '');
            else
                el_checkbox_all.parent('.ui.checkbox').css('display', 'none');
            // displaySelectAllCheckboxIf(rowCount);
        }
        // Re-calculate the Document totals
        recalculateDocumentTotals();
    });

function displaySelectAllCheckboxIf(rowCount)
{
    el_checkbox_all = $(itemDoc.table + ' th.select-all-rows input');
    el_checkbox_all.prop('checked', false);

    if (rowCount > 0)
        el_checkbox_all.parent('.ui.checkbox').css('display', '');
    else
        el_checkbox_all.parent('.ui.checkbox').css('display', 'none');
}

// Re-calculate the Document table and totals
function recalculateDocumentTotals()
{
    sum_item_total = sum_tax_amount = 0;

    $(itemDoc.table + ' td.item-total > input').each(
        function() {
            item_total = $(this).val();
            if (item_total == '')
                return false;

            sum_item_total += parseFloat(item_total);
            tax_rate = $(this).closest('tr').find('td.item-tax > input.tax-rate').val();

            tax_amount = item_total * tax_rate / (1 + tax_rate);
            sum_tax_amount += parseFloat(tax_amount);
        });

    $('#' + itemDoc.formId + '-net_total').val(sum_item_total.toFixed(2));
    $('#' + itemDoc.formId + '-tax_amount').val(sum_tax_amount.toFixed(2));
    $('#' + itemDoc.formId + '-total_amount').val(sum_item_total.toFixed(2));

    // Re-calculate the Document payments
    sum_paid_amount = 0;

    $(paymentDoc.table + ' td.paid-amount > input').each(
        function(e) {
            paid_amount = $(this).val();
            if (paid_amount.length != 0) {
                sum_paid_amount += parseFloat(paid_amount);
            }
        });

    if (sum_paid_amount == '')
        sum_paid_amount = 0;

    $('#' + itemDoc.formId + '-balance_amount').val(sum_item_total - sum_paid_amount);
    $('#' + itemDoc.formId + '-paid_amount').val(sum_paid_amount.toFixed(2));
    $('#' + itemDoc.formId + '-change_amount').val(sum_paid_amount - sum_item_total);
}