$(window).on('load', function(e) {
    // $('#sale_type__menu > .menu > a:first').trigger('click');
    $.ajax({
        url: '/pos/default-sale-type',
        type: 'get',
        data: {
        },
        success: function( data )
        {
            refreshSaleTypeElements(data);
            refreshSaleFieldValues(data);
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
    // saleType = $(this).data('sale-type');
    // if (!saleType)
    //     saleType = $('#pos__saleType').val();
});

$('#sale_type__menu > .menu > a').on('click',
function(e) {
    e.stopPropagation();

    $.ajax({
        url: '/pos/change-sale-type',
        type: 'get',
        data: {
            'saleType': $(this).data('sale-type'),
        },
        success: function( data )
        {
            refreshSaleTypeElements(data);
            refreshSaleFieldValues(data);
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
    // return false;
});

function refreshSaleFieldValues(data)
{
    $.each(data.values, function(i) {
        $('#pos__' + i).val(data.values[i]);
    });
}

function refreshSaleTypeElements(data)
{
    $('#sale_type__menu').dropdown('hide');
    $('#pos__saleType').val(data.fieldSaleTypeValue);
    // change cart summary header
    $('#cart__header').text(data.cartSummaryHeaderLabel);
    // change cart summary header color
    $('#cart_summary').removeClass();
    $('#cart_summary').addClass('ui table ' + data.cartSummaryHeaderColor);
    // change submit button label
    $('#pos__submit').text(data.submitButtonLabel);
    // change submit button color
    $('#pos__submit').removeClass();
    $('#pos__submit').addClass('compact fluid ui button ' + data.submitButtonColor);
    if (data.fieldSaleTypeValue == 'Cash') // || data.fieldSaleTypeValue == 'Advance'
        $('.cash-sale__field').show();
    else
        $('.cash-sale__field').hide();
    if (data.fieldSaleTypeValue == 'Credit' || data.fieldSaleTypeValue == 'Return')
        $('.credit-sale__field').show();
    else
        $('.credit-sale__field').hide();
    // re-calculate the total

}