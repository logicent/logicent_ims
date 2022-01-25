<?php

namespace app\enums;

use Yii;

class Type_Customer
{
    const Individual  = 'I';
    const Nonprofit  = 'NP';
    const Company  = 'C';

    public static function enums()
    {
        return [
            self::Company => Yii::t('app', 'Company'),
            self::Nonprofit => Yii::t('app', 'Non-profit'),
            self::Individual => Yii::t('app', 'Individual'),
        ];
    }
}