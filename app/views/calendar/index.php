<?php

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.print.min.css');

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js', ['depends' => 'yii\web\JqueryAsset', 'position' =>  $this::POS_END]);

?>

<div id='calendar'></div>

<?php
$this->registerJs("
    $('#calendar').fullCalendar({
        // put your options and callbacks here
    });
")
 ?>
