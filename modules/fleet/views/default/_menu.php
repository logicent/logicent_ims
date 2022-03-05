<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/fleet/vehicle',
        'label' => 'Vehicle',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Fleet,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/fleet/vehicle-log',
        'label' => 'Vehicle Log',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Fleet,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/fleet/vehicle-service',
        'label' => 'Vehicle Service',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module::Fleet,
        'visible' => true,
    ],
];
?>