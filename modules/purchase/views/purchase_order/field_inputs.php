<?php

use yii\helpers\Html;
?>
<!-- Reference Info -->
<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'status') ?>

    <div class="two fields">
        <?= $this->render('/_form_field/supplier', ['model' => $model, 'form' => $form]) ?>
        <?= $this->render('@app_main/views/_form_field/datetime_input', ['model' => $model, 'form' => $form, 'attribute' => 'issued_at']) ?>
    </div>

    <div class="two fields">
        <?= $form->field($model, 'pr_reference')->textInput() ?>
        <?= $this->render('@app_main/views/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'pr_date']) ?>
    </div>
</div>

<!-- Currency & Price List -->
<?= $this->render('@system_modules/accounts/views/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

<!-- Item table & Document totals -->
<?= $this->render('@system_modules/accounts/views/_form_section/item', ['model' => $model, 'form' => $form]) ?>

<!-- Payment table -->
<?= $this->render('@system_modules/accounts/views/_form_section/payment', ['model' => $model, 'form' => $form]) ?>