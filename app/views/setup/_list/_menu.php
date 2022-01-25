<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;
use app\models\setup\DeveloperSettingsForm;
use app\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => 'sales-person/index',
        'label' => 'Sales Person',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'expense-type/index',
        'label' => 'Expense Type',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'price-list/index',
        'label' => 'Price List',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::StockManager),
    ],
    [
        'route' => 'warehouse/index',
        'label' => 'Warehouse',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StockManager),
    ],
    [
        'route' => 'item-uom/index',
        'label' => 'Item UoM',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StockManager),
    ],
    [
        'route' => 'item-group/index',
        'label' => 'Item Group',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::ItemMaster),
    ],
    [
        'route' => 'brand/index',
        'label' => 'Brand',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::ItemMaster),
    ],
    [
        'route' => 'tax-charge/index',
        'label' => 'Tax & Charge',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::ItemMaster),
    ],
    // [
    //     'route' => 'sales-tax-charge/index',
    //     'label' => 'Sales Tax Charge',
    //     'group' => Type_Module::Selling,
    //     'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    // ],
    // [
    //     'route' => 'purchase-tax-charge/index',
    //     'label' => 'Purchase Tax Charge',
    //     'group' => Type_Module::Buying,
    //     'visible' => Yii::$app->user->can(Type_Role::PurchaseManager),
    // ],
    [
        'route' => 'branch/index',
        'label' => 'Branch',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'item-bundle/index',
        'label' => 'Item Bundle',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::ItemMaster),
    ],
    [
        'route' => 'pos-profile/index',
        'label' => 'POS Profile',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'payment-method/index',
        'label' => 'Payment Method',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'customer-group/index',
        'label' => 'Customer Group',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::CustomerMaster),
    ],
    [
        'route' => 'setup/global-settings/index',
        'label' => 'General Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/business-profile/index',
        'label' => 'Business Profile',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/report-builder/index',
        'label' => 'Report Builder',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/role/index',
        'label' => 'Role',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/smtp-settings/index',
        'label' => 'SMTP Settings',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/data-import-tool/index',
        'label' => 'Data Import',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/db-backup-settings/index',
        'label' => 'Database Backup',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/email-notification/index',
        'label' => 'Email Notification',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'setup/email-queue/index',
        'label' => 'Email Queue',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ]
];
?>