<?php

use app\assets\FlatpickrAsset;

FlatpickrAsset::register($this);

?>

<?= $form->field($model, $attribute)->textInput([
        'class' => 'selected-date pikaday'
    ]) ?>

<?php $this->registerJs(<<<JS
    $('.pikaday').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
    });
JS) ?>