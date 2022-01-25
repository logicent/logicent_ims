<?php

use app\enums\Item_View;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use app\enums\Type_Sale;
use app\helpers\SelectableItems;
use app\models\Customer;
use app\models\Warehouse;

$this->title = Yii::t('app', 'POS Profile');

// Form Sections
// (general)
// Linked users
// Payment methods
// Cart configuration
// Filters
// Print settings (v.1.1)
// Accounting (v.2)

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('/_form/_modal_header', ['model' => $model]) ?>

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
        <?= $form->field( $model, 'allow_user_price_edit')->checkbox() ?>
        <?= $form->field( $model, 'show_shipping')->checkbox() ?>
        <?= $form->field( $model, 'show_discount')->checkbox() ?>
        <?= $form->field( $model, 'allow_user_discount_edit')->checkbox() ?>
        <?php //= $form->field( $model, 'allow_negative_stock')->checkbox() ?>
        <?= $form->field( $model, 'show_sales_person')->checkbox() ?>
        <?= $form->field( $model, 'require_sales_person')->checkbox() ?>
        <?= $form->field( $model, 'require_sales_return_reason')->checkbox() ?>
        <?= $form->field( $model, 'amounts_tax_inclusive')->checkbox() ?>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('/_form/_submit.js'));
?>