<?php

use yii\helpers\Html;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;


$modal = Modal::begin([
    'id' => 'on_hold_sale__modal',
    'size' => Size::SMALL,
]);
$modal::end();

echo Html::submitButton(Yii::t('app', ''), [
        'id' => 'pos__submit',
        'class' => 'compact fluid ui button',
        'style' => "color: #fff; font-size: 125%; margin-bottom: 1em",
        'data' => ['require-reason' => $pos_profile->require_sales_return_reason]
    ])
?>

<!-- trigger suspend via F9 -->
<!-- trigger submit via F10 -->
<!-- Pay Now assumes Cash Sale Customer -->
<!-- Show no. of items in button float:left i.e. in place of icon -->
<!-- or -->
<!-- Pay Later requires actual Customer (not Cash Sale) -->
<!-- trigger submit without payment via F8 -->
<?php
$this->registerJs( $this->render('_sale_action.js') ) ?>
