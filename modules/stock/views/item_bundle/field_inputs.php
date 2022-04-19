
<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    </div>
</div>

<?= $this->render('item/list', [
        'model' => $model
    ]) ?>