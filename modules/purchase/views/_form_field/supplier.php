<?php

use app\helpers\SelectableItems;
use logicent\purchase\models\Supplier;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;
use Zelenin\yii\SemanticUI\modules\Select;

$modal = Modal::begin([
    'id' => 'supplier_modal',
    'size' => Size::SMALL,
]);
$modal::end();

$isReadonly = $this->context->isReadonly;

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
