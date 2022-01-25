<?php

namespace app\enums;

use Yii;

class Type_Supplier
{
    const Individual  = 'I';
    const Local  = 'L';
    const National  = 'N';

    public static function enums()
    {
        return [
            self::Local => Yii::t('app', 'Local'),
            self::National => Yii::t('app', 'National'),
            self::Individual => Yii::t('app', 'Individual'),
        ];
    }
}