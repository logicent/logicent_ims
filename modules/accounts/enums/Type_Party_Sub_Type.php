<?php

namespace logicent\accounts\enums;

use Yii;

class Type_Party_Sub_Type
{
    const Company  = 'C';
    const Individual  = 'I';
    // const Nonprofit  = 'NP';

    public static function enums()
    {
        return [
            self::Company => Yii::t('app', 'Company'),
            self::Individual => Yii::t('app', 'Individual'),
            // self::Nonprofit => Yii::t('app', 'Non-profit'),
        ];
    }
}