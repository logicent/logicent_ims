<?php

use crudle\app\main\enums\Type_Menu_Group;
use crudle\app\setup\enums\Type_Role;


$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/sales/customer/index',
        'label' => 'Customer',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/sales/customer-group/index',
        'label' => 'Customer Group',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/sales/customer-settings/index',
        'label' => 'Customer Settings',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::Settings,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/sales/sales-order/index',
        'label' => 'Sales Order',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/sales/sales-person/index',
        'label' => 'Sales Person',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/sales/quotation/index',
        'label' => 'Quotation',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>