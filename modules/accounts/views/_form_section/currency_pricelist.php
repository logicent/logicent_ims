<?php

use app\enums\Type_Module;
use logicent\accounts\enums\Type_Party;
use app\helpers\SelectableItems;
use logicent\accounts\models\Currency;
use logicent\accounts\models\PriceList;
use Zelenin\yii\SemanticUI\modules\Select;

if (in_array('currency', array_keys($model->attributes))) :
    $currencyAttribute = 'currency';
else :
    $currencyAttribute = 'default_currency';
endif;

if (in_array('price_list_id', array_keys($model->attributes))) :
    $pricelistAttribute = 'price_list_id';
else :
    $pricelistAttribute = 'default_price_list';
endif;
?>
<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, $currencyAttribute)->widget(Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(
                                    Currency::class,
                                    $model, [
                                        'keyAttribute' => 'code',
                                        'valueAttribute' => 'name',
                                        'filters' => ['enabled' => true]
                                    ]),
                    'disabled' => $this->context->isReadonly
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, $pricelistAttribute)->widget(Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get(PriceList::class, $model, [
                        'valueAttribute' => 'id',
                        'filters' => ['module' => Type_Module::enums()[$model::moduleType()]]
                    ]),
                    'disabled' => $this->context->isReadonly
                ]) ?>
        </div>
    </div>
</div>