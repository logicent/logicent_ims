<?php

use crudle\setup\enums\Type_Menu_Group;
use crudle\setup\enums\Type_Role;


$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/accounts/branch/index',
        'label' => 'Branch',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/expense/index',
        'label' => 'Expense',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true,
    ],
    [
        'route' => '/accounts/expense-type/index',
        'label' => 'Expense Type',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/payment-method/index',
        'label' => 'Payment Method',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/payment-request/index',
        'label' => 'Payment Request',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/payment-entry/index',
        'label' => 'Payment Entry',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/sales-invoice/index',
        'label' => 'Sales Invoice',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/purchase-invoice/index',
        'label' => 'Purchase Invoice',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::Transactions,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/price-list/index',
        'label' => 'Price List',
        'icon' => 'cog',
        'iconPath' => null,
        'iconColor' => 'brown',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/sales-tax-charge/index',
        'label' => 'Sales Tax Charge',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/accounts/purchase-tax-charge/index',
        'label' => 'Purchase Tax Charge',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::MasterData,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>