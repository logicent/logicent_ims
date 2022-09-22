<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\purchase\models\Supplier;
use yii\helpers\Html;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;
use icms\FomanticUI\modules\Select;

$modal = Modal::begin([
    'id' => 'supplier_modal',
    'size' => Size::SMALL,
]);
$modal::end();

$isReadonly = $this->context->isReadonly();

echo $form
        ->field($model, 'supplier_id')
        ->widget(Select::class, [
            'search' => true,
            'items' => SelectableItems::get(
                            Supplier::class,
                            $model, [
                                'valueAttribute' => 'name'
                            ]),
            'disabled' => $isReadonly
        ]);
echo Html::activeHiddenInput($model, 'supplier_name');
