<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\stock\models\Warehouse;
use yii\helpers\Html;
use icms\FomanticUI\modules\Select;
?>

<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'title') ?>
    <?= Html::activeHiddenInput($model, 'status') ?>
    <?php //= $form->field($model, 'source_type')->dropDownList([]) ?>
    <?php //= $form->field($model, 'source_id')->dropDownList([]) ?>
    <?php //= $form->field($model, 'party')->dropDownList([]) ?>
    <?php //= $form->field($model, 'party_id')->dropDownList([]) ?>
    <div class="two fields">
        <?= $form->field($model, 'from_warehouse')->widget(Select::class, [
                'search' => true,
                'items' => SelectableItems::get(Warehouse::class, $model, ['valueAttribute' => 'id']),
                'disabled' => $isReadonly,
            ]) ?>
        <?= $form->field($model, 'to_warehouse')->widget(Select::class, [
                'search' => true,
                'items' => SelectableItems::get(Warehouse::class, $model, ['valueAttribute' => 'id']),
                'disabled' => $isReadonly,
            ]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>
        <?= $this->render('@app_main/views/_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'issued_at']) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'total_quantity')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'total_amount')->textInput(['readonly' => true]) ?>
    </div>
</div>
<?= $this->render('item/list', [
    'model' => $model
]) ?>
<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'remarks')->textarea(['rows' => 3, 'readonly' => $isReadonly]) ?>
    </div>
</div>