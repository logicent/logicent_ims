$('#_item tfoot').on('click', '.add-row',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution
        el_table_body = $(this).closest('table.in-form').find('tbody')
        has_no_data = el_table_body.find('tr#no_data').length == 1;

        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'formView': $(this).data('form-view'),
                'nextRowId': el_table_body.find('tr').length + 1
            },
            success: function(response) {
                if (has_no_data)
                    el_table_body.find('tr#no_data').remove();

                el_table_body.append(response);
                el_checkbox_all = $('#_item th.select-all-rows > input');

                rowCount = $('#_item tbody > tr').length;
                if (rowCount > 0)
                    el_checkbox_all.css('display', '');
                else
                    el_checkbox_all.css('display', 'none');
                // displaySelectAllCheckboxIf()
                // if (rowCount > 1)
                    // nothing yet
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$('#_item tbody').on('change', 'select.list-option',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        el_table_row = $(this).closest('tr');

        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            data: {
                'item_id': $(this).val()
            },
            success: function(item) {
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$('#_item tbody').on('change', 'td.item-qty input',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        el_table_row = $(this).closest('tr');
    });

$('#_item th.select-all-rows > input').on('click',
    function(e) {
        select_all_rows = $(this).is(':checked');

        $('#_item .select-row > input').each(
            function(e) {
                if (select_all_rows)
                    $(this).prop('checked', true);
                else
                    $(this).prop('checked', false);
            });

        if (select_all_rows)
            $('#_item .del-row').css('display', '');
        else
            $('#_item .del-row').css('display', 'none');
    });

$('#_item tbody').on('click', '.select-row > input',
    function(e) {
        selected_row = $(this).is(':checked');

        if (selected_row)
            $('#_item .del-row').css('display', '');
        else
            $('#_item .del-row').css('display', 'none');
    });

$('#_item .del-row').on('click',
    function(e) {
        $(this).css('display', 'none');

        $('#_item td.select-row > input:checked').each(
            function(e) {
                el_table_row = $(this).closest('tr');

                // delete row if only added in table but not persisted in DB
                if ($(this).val() == 'on') // strange value "on" set by default
                {
                    $(this).closest('tr').remove();
                    // return false
                } else
                // delete row from persisted DB table and also from html table
                    $.ajax({
                    url: $(this).data('url'),
                    type: 'post',
                    data: {
                        _csrf: yii.getCsrfToken(),
                        'id': $(this).val(),
                    },
                    success: function(response) {
                        el_table_row.remove();
                        // TODO: update totals fields
                        rowCount = $('#_item tbody > tr').length;
                        if (rowCount > 1) {
                            // nothing yet
                        }
                    },
                    error: function(jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            });

        el_checkbox_all = $('#_item th.select-all-rows > input');
        el_checkbox_all.prop('checked', false);
        el_checkbox_all = $('#_item th.select-all-rows > input');

        rowCount = $('#_item tbody > tr').length;
        if (rowCount > 0)
            el_checkbox_all.css('display', '');
        else
            el_checkbox_all.css('display', 'none');
        // displaySelectAllCheckboxIf()
    });

function displaySelectAllCheckboxIf() {
    countItemRows = $('#_item tbody > tr').length;
    if (countItemRows > 0)
        el_checkbox_all.css('display', '');
    else
        el_checkbox_all.css('display', 'none');

}