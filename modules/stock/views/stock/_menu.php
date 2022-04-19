<?php

use crudle\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    // Stock Ledger
    // Stock Balance
    // Stock Projected Qty
    // Stock Summary
    // Stock Ageing
    // Item Price Stock
    [
        'route' => '/stock/item/index',
        'label' => 'Item',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/item-group/index',
        'label' => 'Item Group',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/item-warehouse/index',
        'label' => 'Item Warehouse',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/item-price/index',
        'label' => 'Item Price',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/item-bundle/index',
        'label' => 'Item Bundle',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/brand/index',
        'label' => 'Brand',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Settings,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/delivery-note/index',
        'label' => 'Delivery Note',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/item-uom/index',
        'label' => 'Item Unit of Measure',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Settings,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/purchase-receipt/index',
        'label' => 'Purchase Receipt',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/stock-settings/index',
        'label' => 'Stock Settings',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Settings,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/stock-entry/index',
        'label' => 'Stock Entry',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
    [
        'route' => '/stock/warehouse/index',
        'label' => 'Warehouse',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Settings,
        'visible' => true, // Yii::$app->user->can(Type_Role::Stockkeeper),
    ],
];
?>