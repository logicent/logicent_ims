<?php

use crudle\setup\enums\Type_Menu_Group;
use crudle\setup\enums\Type_Role;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/pos/pos-invoice/index',
        'label' => 'POS',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/pos/pos-profile/index',
        'label' => 'POS Profile',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Settings,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>