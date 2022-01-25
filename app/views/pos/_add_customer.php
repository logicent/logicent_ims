<?php

use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Accordion;
?>

<?= Accordion::widget([
        'fluid' => true,
        'contentOptions' => [
            'encode' => false,
            // 'class' => 'active' : ''
        ],
        'items' => [
            [
                'title' => 'New Customer',
                'content' => 
                    $form->field($model, 'customer_name')->textInput([
                        'placeholder' => 'Customer Name',
                        'class' => 'transition visible',
                        'style' => 'display: inline !important;',
                        'maxlength' => true])->label(false) . 

                    $form->field($model, 'customer_phone')->widget(MaskedInput::class, [
                        'mask' => ['020 999 9999', '0799 999 999', '0199 999 9999'],
                        'options' => [
                            'placeholder' => 'Customer Phone',
                            'class' => 'transition visible',
                            'style' => 'display: inline !important;',
                            'maxlength' => true
                        ]
                    ])->label(false) .

                    Elements::button('Add Customer', [
                                    'id' => 'new_customer', 
                                    'class' => 'compact mini',
                                    'data' => [
                                        'url' => Url::to(['add-customer'])
                                    ]
                            ])
            ],
        ]
        ]);

$this->registerJs(<<<JS
    $('#new_customer').on('click', function (e) {
        el_customer_name = $('#salesorder-customer_name');
        el_customer_phone = $('#salesorder-customer_phone')

        $.ajax({
            url: $(this).data('url'),
            type: 'post',
            data: {
                _csrf: yii.getCsrfToken(),
                'customer_name': el_customer_name.val(),
                'customer_phone': el_customer_phone.val(),
            },
            success: function( response )
            {
                // console.log(response.customerList);
                el_customer_id = $('#salesorder-customer_id .ui.dropdown');
                el_customer_id.dropdown({
                    values: $.map(response.customerList, function(value, index) {
                        return [value, index];
                    })
                });
                el_customer_name.val('');
                el_customer_phone.val('');
                $('.ui.accordion').accordion('close');
                // $('.ui.accordion .title', '.ui.accordion .content').removeClass('active');
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
    });

    $('#load_customer_modal').on('click', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution

        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            data: {
                _csrf: yii.getCsrfToken(),
            },
            success: function( response )
            {
                $('#customer_modal .content').html( response ); // Target '.content' to keep close button in modal
                $('#customer_modal').modal({ closable : false })
                                    .modal('show'); // !!! Use the modal#id not '.ui.modal' to avoid load issues
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
    });

    // $('#customer').on('beforeSubmit', function (e) {
    //     if (!confirm("Permanently Submit?")) {
    //         return false;
    //     }
    //     return true;
    // });
JS) ?>