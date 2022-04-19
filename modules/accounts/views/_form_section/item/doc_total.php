<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="ui transparent input column">
            <?= $form->field($model, 'total_quantity')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'amounts_tax_inclusive')->checkbox(['class' => $this->context->isReadonly() ? 'read-only' : '']) ?>
        </div>
        <div class="ui transparent number input emphasis column">
            <?= $form->field($model, 'net_total')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'tax_amount')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'total_amount')->textInput(['readonly' => true]) ?>
        <?php
            if ($model->hasAccountingImpact()) :
                if ((double) $model->deposit_amount > 0) :
                    echo $form->field($model, 'deposit_amount')->textInput(['readonly' => true]);
                endif;
                echo $form->field($model, 'paid_amount')->textInput(['readonly' => true]);
                if (in_array('is_pos', $model->attributes())) :
                    echo $form->field($model, 'change_amount')->textInput(['readonly' => true]);
                else :
                    echo $form->field($model, 'balance_amount')->textInput(['readonly' => true]);
                endif;
                if ((double) $model->rounding_adjustment <> 0) :
                    echo $form->field($model, 'rounding_adjustment')->textInput(['readonly' => true]);
                    echo $form->field($model, 'rounded_total')->textInput(['readonly' => true]);
                endif;
            endif ?>
        </div>
    </div>
</div>