<?php

use app\enums\Type_Sale;
use yii\helpers\Html;
?>

<div id="sale_type__menu" class="ui basic floating dropdown pointing primary button" style="padding-right: 8.75px;">
    <?= Html::a(Yii::t('app', 'Sale Type'), null, ['class' => 'item']) ?>&ensp;
    <i class="down small chevron icon"></i>
    <div class="menu">
<?php
    echo Html::a(Yii::t('app', 'Cash Sale'), null, [
                    'class' => 'item',
                    'id' => 'cash_sale__item',
                    'data' => ['sale-type' => Type_Sale::Cash]
                ]);

    if ( (bool) $pos_profile->hide_credit_sale === false ) :
        echo Html::a(Yii::t('app', 'Credit Sale'), null, [
                        'class' => 'item',
                        'id' => 'credit_sale__item',
                        'data' => ['sale-type' => Type_Sale::Credit]
                    ]);
    endif;
    echo Html::tag('div', null, ['role' => 'separator', 'class' => 'divider', 'style' => 'margin: 0']);

    echo Html::a(Yii::t('app', 'Return Sale'), null, [
                    'class' => 'item',
                    'id' => 'return_sale__item',
                    'data' => ['sale-type' => Type_Sale::Return]
                ]) ?>
    </div>
</div>

<?php $this->registerJs( $this->render('_sale_type.js') ) ?>