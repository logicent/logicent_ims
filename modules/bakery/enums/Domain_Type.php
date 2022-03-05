<?php

namespace app\enums;

use Yii;

class Domain_Type
{
    const Retail    = 'Retail';

    public static function enums()
    {
        return [
            self::Retail,
        ];
    }
}
