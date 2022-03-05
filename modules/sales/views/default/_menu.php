<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/sales/customer',
        'label' => 'Customer',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => '/sales/customer-group',
        'label' => 'Customer Group',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => '/sales/customer-settings',
        'label' => 'Customer Settings',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => '/sales/sales-order',
        'label' => 'Sales Order',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesPerson),
    ],
    [
        'route' => '/sales/sales-person',
        'label' => 'Sales Person',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesPerson),
    ],
    [
        'route' => '/sales/quotation',
        'label' => 'Quotation',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesPerson),
    ],
];
?>