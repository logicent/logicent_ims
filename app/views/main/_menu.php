<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

// $deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => 'sales/customer/index',
        'label' => 'Customer',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'report/index',
        'label' => 'Reports',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module_Sub_Module::PoS,
        'visible' => true, // which permissions?
    ],
    [
        'route' => 'sales/pos/index',
        'label' => 'POS',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::PoS,
        'visible' => Yii::$app->user->can(Type_Role::Cashier),
    ],
    [
        'route' => 'stock/item/index',
        'label' => 'Item',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Permission::List .' '. Type_Model::Item),
    ],
    [
        'route' => 'accounts/purchase-invoice/index',
        'label' => 'Purchases',
        'icon' => 'horizontally flipped truck',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module_Sub_Module::PoS,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'setup/setup/index',
        'label' => Type_Model::Setup,
        'icon' => 'cog',
        'iconPath' => null,
        'iconColor' => 'brown',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>