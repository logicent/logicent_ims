// search for item and add to list with totals update
$('#pos__item-search').on('change',
    function(e) {
		el_item = $(this);
		item_id = e.target.value;
        if (item_id == '')
			return false;

        el_table_body = $('#cart_items').find('tbody');
        // el_list_table = $('#list').find('tbody');
        // el_grid_thumbs = $('#grid').find('.row');
        last_row_id = el_table_body.find('tr').not('#no_items').length;
        has_no_items = el_table_body.find('tr#no_items').length == 1;

        $.ajax({
            type: 'get',
            url: '/pos/item-search',
            data: {
				'itemGroupId': $('#pos__item-group').val(),
                'itemId': item_id,
                'nextRowId': last_row_id + 1,
            },
            success: function(item) 
            {
				if (has_no_items) {
					$('#no_items').remove();
					$('#cancel_sale__btn').addClass('red');
					$('#cancel_sale__btn').removeClass('disabled');
				}

				$('.payment-entry').attr('readonly', false);

				el_table_body.append(item);
				// get all inputs from list after add
				linesInputs = getLinesInputs();
				docTotalInputs = getDocTotalInputs();
				// update cart_total amounts
                recalculateDocTotals(linesInputs, docTotalInputs);
				// clear selected item in search
				el_item.dropdown('clear');
				el_table_body.find('td.qty > input:last').focus().select();
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        });
	});

	$('#pos__item-group').on('change',
		function() {
			el_group = $(this);
			group_id = el_group.val();

			$.ajax({
				type: 'get',
				url: '/pos/item-group-filter',
				data: {
					'group_id': group_id,
				},
				success: function(items)
				{
					el_item_search = $('#pos__item-search');
					// replace list options
					el_item_search.html(items);
					el_item_search.focus();
				},
				error: function(jqXhr, textStatus, errorThrown) {
					console.log(errorThrown)
				}
			});
		});

	// display item images 
	$('#item_grid').on('click', function() {
		items = $('#item_detail').find('td.item > input');
		
		item_ids = '';
		items.each(function(i, el){
			item_ids += $(this).val();
			if ((i + 1) < items.length)
				item_ids += ',';
		});

		$.ajax({
			url: 'pos/item-image-view',
			type: 'post',
			data: {
				'item_ids': item_ids,
			},
			success: function(images) {
				// add the images to div
				$('#grid').html(images);
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	});