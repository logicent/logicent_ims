<?php

use app\helpers\SelectableItems;
use logicent\stock\models\ItemGroup;
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <?= $form->field($model, 'description')->textArea(['rows' => 2, 'style' => 'min-height: 104px']) ?>
</div>
<div class="ui bottom attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'parent_group')->dropDownList(
                SelectableItems::get(ItemGroup::class, $model, [
                    'valueAttribute' => 'id',
                    'filters' => ['is_group' => true]
                ])
            ) ?>
        <?= $form->field($model, 'is_group')->checkbox()->label('&nbsp;') ?>
    </div>
</div>
