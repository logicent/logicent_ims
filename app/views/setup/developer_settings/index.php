<?php

use app\enums\Type_Role;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

// use app\assets\PikadayAsset;
// PikadayAsset::register($this);

$this->title = Yii::t('app', 'Developer');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('/_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field( $model, 'endUserLicense' )->textInput( ['maxlength' => true, 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)] ) ?>
            <?= $form->field( $model, 'endUserReference', ['hintOptions' => ['tag' => 'small', 'class' => 'text-muted']] )->textInput( ['maxlength' => true, 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)] ) ?>
        </div>
        <div class="two fields">
            <?= $form->field( $model, 'licenseValidFrom' )
                    ->textInput( [
                        'class' => 'pikaday', 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)
                    ]) ?>
            <?= $form->field( $model, 'licenseValidTo' )
                    ->textInput( [
                        'class' => 'pikaday', 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)
                    ]) ?>
        </div>
        <div class="two fields">
            <?= $form->field( $model, 'userLimit', ['hintOptions' => ['tag' => 'small', 'class' => 'text-muted']] )
                    ->textInput( ['readonly' => !Yii::$app->user->can(Type_Role::Administrator)] ) ?>
        </div>
        <?= $form->field( $model, 'allow_salesPersonLogin' )
                ->checkbox([
                    'class' => !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                ]) ?>
    </div>
<?php
    if ( Yii::$app->user->can(Type_Role::Administrator) ) : ?>
        <div class="ui secondary attached centered header segment text-muted">
            <?= Yii::t('app', 'Integrations') ?>
        </div>
        <div class="ui attached padded segment">
            <?= $form->field( $model, 'enable_mobileMoneyPayment', [
                        'hintOptions' => [
                            'tag' => 'div',
                            'class' => 'text-muted',
                            'style' => 'margin-top: 4px; margin-left: 26px; font-size: 80%;',
                        ]
                    ] )
                    ->checkbox([
                        'class' => !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                    ]) ?>
            <?= $form->field( $model, 'enable_dataAnalytics', [
                        'hintOptions' => [
                            'tag' => 'div',
                            'class' => 'text-muted',
                            'style' => 'margin-top: 4px; margin-left: 26px; font-size: 80%',
                        ]
                    ])
                    ->checkbox([
                        'class' => 'disabled' // !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                    ]) ?>
        </div>
        <div class="ui secondary attached centered header segment text-muted">
            <?= Yii::t('app', 'Additional Modules') ?>
        </div>
        <div class="ui attached padded segment">
            <?= $form->field( $model, 'enable_website', [
                        'hintOptions' => [
                            'tag' => 'div',
                            'class' => 'text-muted',
                            'style' => 'margin-top: 4px; margin-left: 26px; font-size: 80%',
                        ]
                    ])
                    ->checkbox([
                        'class' => !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                    ]) ?>
            <?= $form->field( $model, 'enable_eCommerce', [
                        'hintOptions' => [
                            'tag' => 'div',
                            'class' => 'text-muted',
                            'style' => 'margin-top: 4px; margin-left: 26px; font-size: 80%',
                        ]
                    ])
                    ->checkbox([
                        'class' => !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                    ]) ?>
        </div>
<?php
    endif;
ActiveForm::end();
$this->registerJs($this->render('/_form/_submit.js'));

$this->registerJs(<<<JS
    $('#delete_all_data').on('click', 
        function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
                data: {
                },
            })
            .done(function (response) {
                alert(response);
            })
            .fail(function () {
                // request failed
            });
    });

    $('#create_db_dump').on('click', 
        function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
                data: {
                },
            })
            .done(function (response) {
                alert(response);
            })
            .fail(function () {
                // request failed
            });
    });
    // el_licenseValidFrom = $('#developerform-licensevalidfrom');
    // if (!el_licenseValidFrom.get(0).hasAttribute('readonly'))
    //     var licenseValidFrom = new Pikaday({ field: el_licenseValidFrom });

    // el_licenseValidTo = $('#developerform-licensevalidto');
    // if (!el_licenseValidTo[0].hasAttribute('readonly'))
    //     var licenseValidTo = new Pikaday({ field: el_licenseValidTo });
JS)
?>