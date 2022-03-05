$(paymentDoc.table + ' tbody').on('click', 'input.pikadaytime',
    function(e) {
        $(this).flatpickr({
            // hourIncrement : 1,
            minuteIncrement: 15,
            enableTime: true
        });
    });

$(paymentDoc.section + ' .add-row').on('click',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution
        el_table_body = $(paymentDoc.table + ' tbody');
        has_no_data = el_table_body.find('tr#no_data').length == 1;

        $.ajax({
            url: paymentDoc.addPaymentUrl,
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'formView': $(this).data('form-view'),
                'nextRowId': el_table_body.find('tr').length + 1,
            },
            success: function(response) {
                if (has_no_data)
                    el_table_body.find('tr#no_data').remove();

                el_table_body.append(response);

                $('#submit_btn').hide();
                $('#save_btn').show();

                displaySelectAllCheckboxIf()
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$(paymentDoc.table + ' tbody').on('change', 'td.paid-amount > input',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '' || $(this).val() == '0')
            return false;

        // Re-calculate the document totals
        sum_paid_amount = 0;

        $('td.paid-amount > input').each(
            function(e) {
                paid_amount = $(this).val();
                if (paid_amount.length != 0) {
                    sum_paid_amount += parseFloat(paid_amount);
                }
            });

        balanceAmount = $('#' + itemDoc.formId + '-total_amount').val() - sum_paid_amount;
        $('#' + itemDoc.formId + '-balance_amount').val(balanceAmount.toFixed(2));
        $('#' + itemDoc.formId + '-paid_amount').val(sum_paid_amount.toFixed(2));
        totalAmount = $('#' + itemDoc.formId + '-total_amount').val();
        $('#' + itemDoc.formId + '-change_amount').val(sum_paid_amount - totalAmount);
    });

$(paymentDoc.table).on('click',  'th.select-all-rows > .ui.checkbox',
    function(e) {
        select_all_rows = $(this).find('input').is(':checked');
        all_rows = $(paymentDoc.table + ' tbody').find('td.select-row input');
        del_row = $(paymentDoc.section + ' .del-row');

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

$(paymentDoc.table + ' tbody').on('click', 'td.select-row > .ui.checkbox',
    function(e) {
        select_all_rows = $(paymentDoc.table + ' thead').find('.select-all-rows > .ui.checkbox > input');
        all_rows = $(paymentDoc.table + ' tbody').find('input:checkbox').length;
        selected_rows = $(paymentDoc.table + ' tbody').find('input:checked').length;
        del_row = $(paymentDoc.section + ' .del-row');

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

$(paymentDoc.section + ' .del-row').on('click',
    function(e) {
        $(this).css('display', 'none');
        modelClass = $(this).data('model-class');

        $(paymentDoc.table + ' td.select-row > .ui.checkbox > input:checkbox').each(
            function(e) {
                el_table_row = $(this).closest('tr');
                el_id = el_table_row.find('td.mode-of-payment > input');

                if (el_id.val() == '')
                {
                    el_table_row.remove();
                } else {
                    $.ajax({
                        url: paymentDoc.deletePaymentUrl,
                        type: 'post',
                        data: {
                            _csrf: yii.getCsrfToken(),
                            'modelId': el_id.val(),
                            'modelType': 'Payment'
                        },
                        success: function(response) {
                            el_table_row.remove();
                        },
                        error: function(jqXhr, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                }
            });

        displaySelectAllCheckboxIf()
    });

function displaySelectAllCheckboxIf()
{
    el_checkbox_all = $(paymentDoc.table + ' th.select-all-rows > .ui.checkbox > input:checkbox');
    el_checkbox_all.prop('checked', false);

    rowCount = $(paymentDoc.table + ' tbody > tr').length;
    if (rowCount > 0)
        el_checkbox_all.parent('.ui.checkbox').css('display', '');
    else
        el_checkbox_all.parent('.ui.checkbox').css('display', 'none');
}