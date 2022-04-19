<?php

namespace logicent\accounts\enums;

use Yii;

class Type_Payment
{
    const Incoming  = 'Incoming';
    const Outgoing  = 'Outgoing';

    public static function enums()
    {
        return [
            self::Incoming => Yii::t('app', 'Incoming'),
            self::Outgoing => Yii::t('app', 'Outgoing'),
        ];
    }

    public static function enumsLabel()
    {
        return [
        ];
    }
}