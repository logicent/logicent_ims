<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => 'sales/sales-person/index',
        'label' => 'Sales Person',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'accounts/expense-type/index',
        'label' => 'Expense Type',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'accounts/price-list/index',
        'label' => 'Price List',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'stock/warehouse/index',
        'label' => 'Warehouse',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'stock/item-uom/index',
        'label' => 'Item UoM',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'stock/item-group/index',
        'label' => 'Item Group',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'stock/brand/index',
        'label' => 'Brand',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'accounts/tax-charge/index',
        'label' => 'Tax & Charge',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    // [
    //     'route' => 'accounts/sales-tax-charge/index',
    //     'label' => 'Sales Tax Charge',
    //     'group' => Type_Module::Selling,
    //     'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    // ],
    // [
    //     'route' => 'accounts/purchase-tax-charge/index',
    //     'label' => 'Purchase Tax Charge',
    //     'group' => Type_Module::Buying,
    //     'visible' => Yii::$app->user->can(Type_Role::PurchaseManager),
    // ],
    [
        'route' => 'accounts/branch/index',
        'label' => 'Branch',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'stock/item-bundle/index',
        'label' => 'Item Bundle',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'sales/pos-profile/index',
        'label' => 'POS Profile',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'accounts/payment-method/index',
        'label' => 'Payment Method',
        'group' => Type_Module::Accounting,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'purchase/supplier-settings/index',
        'label' => 'Supplier Settings',
        'group' => Type_Module::Buying,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'setup/print-style/index',
        'label' => 'Print Style',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/print-format/index',
        'label' => 'Print Format',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/printer-settings/index',
        'label' => 'Printer Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/print-settings/index',
        'label' => 'Print Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'sales/customer-settings/index',
        'label' => 'Customer Settings',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'stock/stock-settings/index',
        'label' => 'Stock Settings',
        'group' => Type_Module::Stock,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
    ],
    [
        'route' => 'sales/customer-group/index',
        'label' => 'Customer Group',
        'group' => Type_Module::Selling,
        'visible' => Yii::$app->user->can(Type_Role::SalesManager),
    ],
    [
        'route' => 'purchase/supplier-group/index',
        'label' => 'Supplier Group',
        'group' => Type_Module::Buying,
        'visible' => Yii::$app->user->can(Type_Role::StoresManager),
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