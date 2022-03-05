<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/accounts/branch',
        'label' => 'Branch',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => '/accounts/expense',
        'label' => 'Expense',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module_Sub_Module::AccountsPayable,
        'visible' => true,
    ],
    [
        'route' => '/accounts/expense-type',
        'label' => 'Expense Type',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::AccountsPayable,
        'visible' => Yii::$app->user->can(Type_Role::Accountant),
    ],
    [
        'route' => '/accounts/payment-method',
        'label' => 'Payment Method',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::Accountant),
    ],
    [
        'route' => '/accounts/payment-request',
        'label' => 'Payment Request',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::Accountant),
    ],
    [
        'route' => '/accounts/payment-entry',
        'label' => 'Payment Entry',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::Bookkeeper),
    ],
    [
        'route' => '/accounts/sales-invoice',
        'label' => 'Sales Invoice',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::AccountsReceivable,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => '/accounts/purchase-invoice',
        'label' => 'Purchase Invoice',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::AccountsPayable,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => '/accounts/price-list',
        'label' => 'Price List',
        'icon' => 'cog',
        'iconPath' => null,
        'iconColor' => 'brown',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::Storekeeper),
    ],
    [
        'route' => '/accounts/sales-tax-charge',
        'label' => 'Sales Tax Charge',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::AccountsReceivable,
        'visible' => Yii::$app->user->can(Type_Role::Accountant),
    ],
    [
        'route' => '/accounts/purchase-tax-charge',
        'label' => 'Purchase Tax Charge',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::AccountsPayable,
        'visible' => Yii::$app->user->can(Type_Role::Accountant),
    ],
];
?>