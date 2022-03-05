$('#add_row').on('click', function(e) {
    e.stopPropagation(); // !! DO NOT use return false; it stops execution

    $.ajax({
        url: $(this).data('action-url'),
        type: 'get',
        data: {
            _csrf: yii.getCsrfToken(),
            'prod_line_id': doc.parent_id
        },
        success: function(response) {
            $(doc.table_id).append(response);
        },
        error: function(jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});

$('#del_row').on('click', function(e) {
    $(this).css('display', 'none');
    del_row_url = $(this).data('action-url');

    $(doc.table_id + ' td:first-child > input:checked').each(
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
                url: del_row_url,
                type: 'post',
                data: {
                    _csrf: yii.getCsrfToken(),
                    'id': $(this).val(),
                },
                success: function(response) {
                    el_table_row.remove();
                },
                error: function(jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
            // end else
        });

    el_checkbox_all = $(doc.table_id + ' th.select-all-rows > input');

    el_checkbox_all.prop('checked', false);

    el_checkbox_all = $(doc.table_id + ' th.select-all-rows > input');

    rowCount = $(doc.table_id + ' tbody > tr').length;
    if (rowCount > 0)
        el_checkbox_all.css('display', '');
    else
        el_checkbox_all.css('display', 'none');
    // displaySelectAllCheckboxIf()
});