
$('.ui.accordion').accordion();

$('#item_view a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
    // $(this) show a btn as active
});
$('#item_view a:first').tab('show')

$('#pos__submit').on('click', 
function () {
    // check if Sale item(s) exist
    el_items = $('#cart_items').find('tbody');
    // check if Sale item(s) exist
    // item_rows = el_items.find('tr').not('#no_items').length;
    has_no_items = el_items.find('tr#no_items').length == 1;
    if (has_no_items) {
        alert('Sorry, at least 1 Item must be added to Sale');
        $('#pos__item_search').focus();
        return false;
    }

    // check if Sale payments exist or balance is > 0
    if ($('#pos__saleType').val() == 'Cash' && $('#pos__balance_amount').val() > 0) {
        alert('Sorry, full payment must be added to Sale');
        $('.ui.accordion > .title').accordion('open');
        // check default payment method and set focus to it
        $('.payment-entry:first').focus();
        return false;
    }

    // check if reason for return is required
    if ($('#pos__saleType').val() == 'Return' &&
        $(this).data('require-reason') == '1' &&
        $('#pos__notes').val() == '')
    {
        alert('Reason for Sales Return is required in Notes');
        $('#pos__notes').focus();
        return false;
    }
    // continue Submit Sale
});

$('#hold_sale__btn').on('click',
function () {
    el_items = $('#cart_items').find('tbody');
    // Check if Sale item(s) exist in till bill
    has_no_items = el_items.find('tr#no_items').length == 1;
    if (has_no_items) {
        // Check if draft POS Invoices for current user + TODAY date exist in DB
        // If found show list to allow Cashier selection of Sale Invoice
        $.ajax({
            url: '/pos/pos/on-hold-sale',
            type: 'post',
            data: {
            },
            success: function( response )
            {
                $('#on_hold_sale__modal .content').html( response ); // Target '.content' to keep close button in modal
                $('#on_hold_sale__modal').modal({ 
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
    }
    // use AJAX to Submit Cashier Invoice as Draft/Unpaid with loaded items
    return false;
});

$('#cancel_sale__btn').on('click', function () {
    // Check if POS Profile for current user requires approval to cancel
    // Check if Sale item(s) exists in till bill
    el_items = $('#cart_items').find('tbody');
    has_no_items = el_items.find('tr#no_items').length == 1;
    if (has_no_items) {
        $('#pos__item_search').focus();
        return false;
    }
    // else Cancel and release committed quantities if applicable
    // use AJAX to call new_sale() action
});
