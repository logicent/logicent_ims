<?php

namespace crudle\ext\accounts\enums;

use Yii;

class Type_Module
{
    const Buying  = 'Buying';
    const Selling  = 'Selling';

    public static function enums()
    {
        return [
            self::Buying => Yii::t('app', 'Buying'),
            self::Selling => Yii::t('app', 'Selling'),
        ];
    }

    public static function enumsLabel()
    {
        return [
        ];
    }
}