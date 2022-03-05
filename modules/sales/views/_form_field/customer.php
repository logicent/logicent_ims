<?php

use app\helpers\SelectableItems;
use logicent\sales\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Accordion;
use Zelenin\yii\SemanticUI\modules\Modal;
use Zelenin\yii\SemanticUI\modules\Select;

$modal = Modal::begin([
    'id' => 'customer_modal',
    'size' => Size::SMALL,
]);
$modal::end();

$isReadonly = $this->context->isReadonly;

echo $form
        ->field($model, 'customer_id')
        ->widget(Select::class, [
            'search' => true,
            'items' => SelectableItems::get(
                            Customer::class,
                            $model, [
                                'valueAttribute' => 'name'
                            ]),
            'disabled' => $isReadonly
        ]);
        // ->hint(Html::tag('small', 'Select existing Customer in list above or use fields below to add new customer'), 
        //         ['class' => 'text-muted']);
echo Html::activeHiddenInput($model, 'customer_name');
// echo Accordion::widget([
//         'fluid' => true,
//         'contentOptions' => [
//         'encode' => false,
//         // 'class' => 'active' : ''
//         ],
//         'items' => [
//         [
//             'title' => 'New Customer',
//             'content' => 
//                 $form->field($model, 'customer_name')->textInput([
//                     'placeholder' => 'Customer Name',
//                     'class' => 'transition visible',
//                     'style' => 'display: inline !important;',
//                     'maxlength' => true])->label(false) . 

//                 $form->field($model, 'customer_phone')->widget(MaskedInput::class, [
//                     'mask' => ['020 999 9999', '0799 999 999', '0199 999 9999'],
//                     'options' => [
//                         'placeholder' => 'Customer Phone',
//                         'class' => 'transition visible',
//                         'style' => 'display: inline !important;',
//                         'maxlength' => true
//                     ]
//                 ])->label(false) .

//                 Elements::button('Add Customer', [
//                                 'id' => 'new_customer', 
//                                 'class' => 'compact mini',
//                                 'data' => [
//                                     'url' => Url::to(['add-customer'])
//                                 ]
//                         ])
//         ],
//     ]
// ]) ?>
