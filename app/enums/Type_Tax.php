<?php

namespace app\enums;

use Yii;

class Type_Tax
{
    const Normal  = 'Normal';
    const Inclusive  = 'Inclusive';
    // const Compound  = 'Compound';
    // const Fixed  = 'Fixed';

    public static function enums()
    {
        return [
            self::Normal => Yii::t('app', 'Normal'),
            self::Inclusive => Yii::t('app', 'Inclusive'),
            // self::Compound => Yii::t('app', 'Compound'),
            // self::Fixed => Yii::t('app', 'Fixed'),
        ];
    }

    public static function enumsLabel()
    {
        return [
        ];
    }
}