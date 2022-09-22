<?php

namespace crudle\ext\accounts\enums;

use Yii;

class Type_Journal
{
    const General  = 'General';

    public static function enums()
    {
        return [
            self::General => Yii::t('app', 'General'),
        ];
    }

    public static function enumsLabel()
    {
        return [
        ];
    }
}