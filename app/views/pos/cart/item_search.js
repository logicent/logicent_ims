// search for item and add to list with totals update
$('#pos__item-search').on('keyup',
    function(e) {
		el_item = $(this);
		item_id = e.target.value;
        if (item_id == '') {
			// force hide if visible
			$('#pos__search_result').hide();
			return false;
		}

		if (item_id.length < 2)
			return false;

        $.ajax({
            type: 'get',
            url: '/pos/item-search',
            data: {
                'itemSearch': item_id, // $('#pos__item-search').val()
				'itemWarehouse': $('#pos__item-warehouse').val(),
				// 'itemGroup': $('#pos__item-group').val(),
            },
            success: function(response)
            {
				$('#pos__search_result').show();

				if (response.result.length > 0) { // To-Do: check if empty array
					// cache the no item element
					noItemFound = $('#no_item_found');
					// force hide on no item
					noItemFound.hide();
					// overwrite result since the query is updated
					$('#pos__search_result').html(response.result);
					// restore the hidden no item element
					$('#pos__search_result').append(noItemFound);
				}
				else {
					// remove previous search result
					$('#pos__search_result').find('a').not('#no_item_found').remove();
					// showthe no item element
					$('#no_item_found').show();
				}
				// el_item.val();
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        });
	});

// add item found to cart and recalculate the sale total
$('#pos__search_result').on('click', 'a.item',
    function(e) {
		e.preventDefault();
		el_item = $(this);

        el_image_grid = $('#cart_images');
        el_table_body = $('#cart_items').find('tbody');

        rowCount = el_table_body.find('tr').not('#no_items').length;
        hasNoItems = el_table_body.find('tr#no_items').length == 1;

        $.ajax({
            type: 'post',
            url: $(this).attr('href'),
            data: {
                'itemId': $(this).attr('id'),
				'warehouseId': $('#pos__item-warehouse').val(),
                'nextRowId': rowCount + 1,
            },
            success: function(response)
            {
				$('#pos__item-search').val('');
				$('#pos__search_result').hide();

				if (hasNoItems) {
					$('#no_items').remove();
					$('#no_image').remove();
					$('#cancel_sale__btn').addClass('red');
					$('#cancel_sale__btn').removeClass('disabled');
				}

				$('.payment-entry').attr('readonly', false);

				// add selected item to table
				el_table_body.append(response.item);
				// get all inputs from list after add
				linesInputs = getLinesInputs();
				docTotalInputs = getDocTotalInputs();
				// update cart_total amounts
                recalculateDocTotals(linesInputs, docTotalInputs);
				// add selected item to grid
				el_image_grid.append(response.image);
				// clear selected item in search
				el_table_body.find('td.qty > input:last').focus().select();
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        });
		return false;
	});

	// $('#pos__item-warehouse').on('change',
	// 	function() {
	// 		el_location = $(this);
	// 		location_id = el_location.val();

	// 		$.ajax({
	// 			type: 'get',
	// 			url: '/pos/item-location-filter',
	// 			data: {
	// 				'location_id': location_id,
	// 			},
	// 			success: function(items)
	// 			{
	// 				el_item_search = $('#pos__item-search');
	// 				// replace list options
	// 				el_item_search.html(items);
	// 				el_item_search.focus();
	// 			},
	// 			error: function(jqXhr, textStatus, errorThrown) {
	// 				console.log(errorThrown)
	// 			}
	// 		});
	// 	});

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