<?php

use app\assets\FlatpickrAsset;

FlatpickrAsset::register($this);

?>

<?= $form->field($model, $attribute)->textInput([
        'class' => 'selected-date pikadaytime',
    ]) ?>

<?php $this->registerJs(<<<JS
    $('.pikadaytime').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
        enableTime: true,
        minuteIncrement: 1,
        enableSeconds: true,
    });
JS) ?>