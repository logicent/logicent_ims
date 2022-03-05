<?php

use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/pos/pos',
        'label' => 'POS',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => '/pos/pos-profile',
        'label' => 'POS Profile',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
];
?>