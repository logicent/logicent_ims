<?php

namespace logicent\accounts\enums;

use Yii;

class Type_Account
{
    const Asset  = 'Asset';

    public static function enums()
    {
        return [
            self::Asset => Yii::t('app', 'Asset'),
        ];
    }

    public static function enumsLabel()
    {
        return [
        ];
    }
}