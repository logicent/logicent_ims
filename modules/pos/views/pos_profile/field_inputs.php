<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\accounts\enums\Type_Sale;
use crudle\ext\sales\models\Customer;
use crudle\ext\stock\enums\Item_View;
use crudle\ext\stock\models\Warehouse;

$this->title = Yii::t('app', 'POS Profile');
// clear breadcrumbs to overwrite
unset($this->params['breadcrumbs']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'POS'), 'url' => ['/pos']];

// Form Sections
// (general)
// Linked users
// Payment methods
// Cart configuration
// Filters
// Print settings (v.1.1)
// Accounting (v.2)
?>
    <div class="ui attached padded segment">
	    <div class="two fields">
			<?= $form->field( $model, 'default_customer')->dropDownList(
					SelectableItems::get(Customer::class, $model, ['valueAttribute' => 'name'])
				) ?>
            <?= $form->field( $model, 'default_warehouse')->dropDownList(
                    SelectableItems::get(
                        Warehouse::class, $model, [
                            'valueAttribute' => 'id',
                            'filters' => ['inactive' => false]
                        ]
                    )
                ) ?>
		</div>
	    <div class="two fields">
	        <?= $form->field( $model, 'default_sale_type')->dropDownList(Type_Sale::enums()) ?>
	        <?= $form->field( $model, 'default_item_view')->dropDownList(Item_View::enums()) ?>
		</div>
        <?= $form->field( $model, 'hide_credit_sale')->checkbox() ?>
        <?= $form->field( $model, 'hide_hold_sale')->checkbox() ?>
        <div class="ui hidden divider"></div>
        <?= $form->field( $model, 'allow_user_price_edit')->checkbox() ?>
        <?php //= $form->field( $model, 'show_shipping')->checkbox() ?>
        <?php //= $form->field( $model, 'show_discount')->checkbox(['class' => 'disabled']) ?>
        <?php //= $form->field( $model, 'allow_user_discount_edit')->checkbox() ?>
        <!-- <div class="ui hidden divider"></div> -->
        <?= $form->field( $model, 'amounts_tax_inclusive')->checkbox() ?>
        <?php //= $form->field( $model, 'allow_negative_stock')->checkbox() ?>
        <div class="ui hidden divider"></div>
        <?= $form->field( $model, 'show_sales_person')->checkbox() ?>
        <?= $form->field( $model, 'require_sales_person')->checkbox() ?>
        <div class="ui hidden divider"></div>
        <?= $form->field( $model, 'require_sales_return_reason')->checkbox() ?>
    </div>