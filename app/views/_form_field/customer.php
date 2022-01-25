<?php

use app\helpers\SelectableItems;
use app\models\Customer;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\helpers\Size;
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
echo Html::activeHiddenInput($model, 'customer_name');
