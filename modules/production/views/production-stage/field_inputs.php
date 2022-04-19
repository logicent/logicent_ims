<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'is_active')->checkbox([
                'inputOptions' => ['readonly' => $model->isReadOnly]
            ]) ?>
        </div>
    </div>
</div>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
        </div>
    </div>
</div>