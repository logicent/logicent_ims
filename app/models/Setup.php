<?php

namespace app\models;

use app\enums\Type_Permission;
use app\models\setup\Settings;

/**
 * This is the model class for page "Setup".
 */
class Setup extends Settings
{
    public static function permissions()
    {
        return [
            Type_Permission::List => Type_Permission::List,
        ];
    }
}
