<?php

namespace app\enums;

class Module_Type
{
    const Production        = 'Production';

    public static function enums()
    {
        return [
            self::Production        => self::Production,
        ];
    }
}