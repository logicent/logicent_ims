<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

use app\models\StockItemGroup;
use app\models\BakeryIngredient;

$form = ActiveForm::begin([
    'enableClientValidation' => false
]);

echo $this->context->renderPartial('/_form/_header', ['model' => $model]) .
    $this->context->renderPartial('_linkedData', ['model' => $model]) ?>

<!-- General -->
    <div class="ui attached padded segment">
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'item_group')->dropDownList(
                                    ArrayHelper::map(StockItemGroup::getListOptions(), 'id', 'name')
                                    , ['prompt' => '']) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'description')->textArea(['rows' => 2]) ?>
                <?= $form->field($model, 'disabled')->checkbox() ?>
                <?= $form->field($model, 'item_type')->hiddenInput()->label(false) ?>
            </div>
        </div>
    </div>

<!-- Stock / Production -->
    <div class="ui attached padded segment">
        <?= $form->field($model, 'is_stock_item')->checkbox() ?>
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'stock_uom')->dropDownList([
                        'Kg' => 'Kg',
                        'Gram' => 'Gram',
                        'Litre' => 'Litre',
                        'Millilitre' => 'Millilitre'
                ]) ?>
                <div class="ui transparent input two fields">
                    <div class="field">
                        <?= $form->field($model, 'qty_in_stock')->textInput(['readonly' => true]) ?>
                    </div>
                    <div class="field">
                        <?= $form->field($model, 'qty_reserved')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui two column grid">
                    <div class="column">
                        <?= $form->field($model, 'net_weight')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="column">
                        <?= $form->field($model, 'weight_uom')->dropDownList([
                                'Kg' => 'Kg',
                                'Gram' => 'Gram',
                                'Litre' => 'Litre',
                                'Millilitre' => 'Millilitre'
                        ]) ?>
                    </div>
                </div>
                <?php //= $form->field($model, 'default_bom')->dropDownList([]) ?>
            </div>
        </div>
    </div>

<!-- Selling / Accounting -->
    <div class="ui attached padded segment">
        <?= $form->field($model, 'is_sales_item')->checkbox() ?>
        <div class="ui two column grid">
            <div class="column">
                <?php //= $form->field($model, 'stock_uom')->dropDownList([]) ?>
                <?= $form->field($model, 'standard_rate')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="column">
                <?php //= $form->field($model, 'max_discount')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'tax_rate')->textInput(['maxlength' => true]) ?>
                <?php //= $form->field($model, 'income_account')->dropDownList([]) ?>
            </div>
        </div>
        <?php //= $form->field($model, 'min_order_qty')->hiddenInput(['maxlength' => true])->label(false) ?>
    </div>

    <!-- Ingredient -->
    <h4 class="ui secondary attached segment centered sub header"><?= Yii::t('app', 'Ingredient') ?></h4>
    <div class="ui attached padded segment">
        <?php //= $this->context->renderPartial('../stock-payment/index', ['model' => $model]) ?>
        <table id="ingredient" class="in-form ui celled table">
            <thead>
                <tr>
                    <th id="select_all_rows">
                        <?= Html::checkbox('0') ?>
                    </th>
                    <th><?= Yii::t('app', 'Name') ?></th>
                    <th class="right aligned"><?= Yii::t('app', 'Qty Required') ?></th>
                    <th class="right aligned"><?= Yii::t('app', 'Unit Cost') ?></th>
                    <th class="right aligned"><?= Yii::t('app', 'Total Cost') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($model->isNewRecord)
                    echo $this->context->renderPartial('_ingredient', ['form' => $form, 
                                                                        'model' => new BakeryIngredient(),
                                                                        'row_id' => '1'
                                                                    ]);
                else
                    foreach ($model->ingredients as $id => $ingredient)
                        echo $this->context->renderPartial('_ingredient', ['form' => $form, 
                                                                            'model' => $ingredient,
                                                                            'row_id' => $id
                                                                        ]);
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <?= Elements::button('Delete', ['id' => 'del_ingredient', 'class' => 'compact red mini', 'style' => 'display : none']) ?>
                        <?= Elements::button('Add Row', ['id' => 'add_ingredient', 'class' => 'compact mini']) ?>
                    </td>
                    <td id="sumtotal-cost">
                        <?php //= $form->field($model->isNewRecord ? $model_bakerycost : $model->bakeryCost, 'ingredient_cost')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Costs -->
    <h4 class="ui secondary attached segment centered sub header"><?= Yii::t('app', 'Costs') ?></h4>
    <div class="ui bottom attached padded segment">
        <div class="ui two column grid">
            <div class="column">
                <?php //= $form->field($bakeryCost, 'baking_cost')->textInput(['maxlength' => true]) ?>
                <?php //= $form->field($bakeryCost, 'icing_cost')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="column">
                <?php //= $form->field($bakeryCost, 'utility_cost')->textInput(['maxlength' => true]) ?>
                <?php //= $form->field($bakeryCost, 'admin_cost')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<?= $this->context->renderPartial('/_form/_footer', ['model' => $model]) ?>

<?php
$this->registerJs("
    $( '#add_ingredient' ).on('click', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution
        
        rowCount = $( '#ingredient tbody > tr' ).length;

        $.ajax({
            url: '" . Url::to(['stock/cake/add-ingredient']) . "',
            type: 'post',
            data: {
                _csrf: yii.getCsrfToken(),
                'last_row_id': rowCount
            },
            success: function( response )
            {
                $('#ingredient tbody').append( response );
                
                if ( rowCount == 0 )
                    $( '#select_all_rows > input' ).css('display', '');
                // $('#ingredient tr:last').after( response );
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
    });

    $( document ).ready( function (e)
    {
        rowCount = $ ('#ingredient tbody tr').length;

        if ( rowCount > 0 )
            $( '#select_all_rows > input' ).css('display', '');
        else
            $( '#select_all_rows > input' ).css('display', 'none');
    });

    $( '#ingredient tbody' ).on('change', 'select.bakery-item', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution

        if ($(this).val() == '')
            return false;
        
        field_UnitCost = $(this).closest('tr').find('td.unit-cost > input');
        field_Qty = $(this).closest('tr').find('td.qty-required > input');

        $.ajax({
            url: '" . Url::to(['stock/cake/get-item']) . "',
            type: 'post',
            data: {
                _csrf: yii.getCsrfToken(),
                'item_id': $(this).val(),
            },
            success: function( last_purchase_rate )
            {
                // console.log( last_purchase_rate );
                field_UnitCost.val( last_purchase_rate );
                field_Qty.focus();
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
    });

    $( '#ingredient tbody' ).on('change', 'td.qty-required input', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution

        if ($(this).val() == '')
            return false;

        // console.log( $(this) );

        field_QtyReqd = $(this);
        field_UnitCost = $(this).closest('tr').find('td.unit-cost > input');
        field_ItemTotalCost = $(this).closest('tr').find('td.item-cost > input');

        field_ItemTotalCost.val( field_QtyReqd.val() * field_UnitCost.val() )
    });

    $( '#ingredient tbody' ).on('change', 'td.unit-cost input', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution

        field_UnitCost = $(this);
        field_QtyReqd = $(this).closest('tr').find('td.qty-required > input');
        field_ItemTotalCost = $(this).closest('tr').find('td.item-cost > input');

        field_ItemTotalCost.val( field_QtyReqd.val() * field_UnitCost.val() )
    });

    $( '#select_all_rows > input' ).on('click', function (e) 
    {
        selectAllRows = $( this ).is( ':checked' );

        $( '.select-row > input' ).each( function (e) 
        {
            if ( selectAllRows )
                $( this ).prop( 'checked', true );
            else
                $( this ).prop( 'checked', false );
        });

        if ( selectAllRows )
            $( '#del_ingredient' ).css('display', '');
        else
            $( '#del_ingredient' ).css('display', 'none');
    });

    $( '#ingredient tbody' ).on('click', '.select-row > input', function (e) 
    {
        selectRow = $( this ).is( ':checked' );

        if ( selectRow )
            $( '#del_ingredient' ).css('display', '');
        else
            $( '#del_ingredient' ).css('display', 'none');
    });

    $( '#del_ingredient' ).on('click', function (e) 
    {
        $( 'td.select-row > input:checked').each( function (e)
        {
            selectedRow = $(this).closest('tr');

            if ( $( this ).val() == 'on' ) // wiered value here
            {
                $(this).closest('tr').remove();
                return false;
            }

            // delete row from the DB table first
            $.ajax({
                url: '" . Url::to(['stock/cake/delete-item']) . "',
                type: 'post',
                data: {
                    _csrf: yii.getCsrfToken(),
                    'id': $(this).val(),
                },
                success: function( response )
                {
                    selectedRow.remove();
                },
                error: function( jqXhr, textStatus, errorThrown )
                {
                    console.log( errorThrown );
                }
            });
        });

        $( '#del_ingredient' ).css('display', 'none');
        $( '#select_all_rows > input' ).prop('checked', false);

        rowCount = $( '#ingredient tbody > tr' ).length;
        if ( rowCount > 0 )
            $( '#select_all_rows > input' ).css('display', '');
        else
            $( '#select_all_rows > input' ).css('display', 'none');
    });
"); ?>