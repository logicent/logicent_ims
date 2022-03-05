<?php

namespace app\enums;

// Custom Roles
// ------------
// Additional roles that may be defined by System Manager(s) and/or Administrator user
// e.g. Enumerator

class Role_Type
{
    // business domain roles
    const Baker = 'Baker';
    const Decorator = 'Decorator';
    const ProductionManager = 'Production manager';

    public static function enums()
    {
        return [
            self::Baker    => self::Baker,
            self::Decorator    => self::Decorator,
            self::ProductionManager    => self::ProductionManager,
        ];
    }
}