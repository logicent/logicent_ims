<?php

namespace app\enums;

use Yii;

// Custom Roles
// ------------
// Additional roles that may be defined by System Manager(s) and/or Administrator user
// e.g. 

class Type_Role
{
    // system roles
    const Administrator = 'Administrator'; // disallow visibility, rename and/or delete
    const SystemManager = 'System Manager'; // disallow rename and/or delete
    // business domain roles
    const SalesPerson = 'Sales Person'; // Purchase Assistant
    const Cashier = 'Cashier'; // Sales Assistant
    const SalesManager = 'Sales Manager'; // Purchase Manager
    const Storekeeper = 'Storekeeper'; // Stores Assistant
    const StoresManager = 'Stores Manager';
    const CustomerService = 'Customer Service';
    // const Bookkeeper = 'Bookkeeper'; // Accounts Assistant
    // const Accountant = 'Accountant'; // Accounts Manager

    public static function enums()
    {
        return [
            self::Administrator => Yii::t('app', 'Administrator'),
            self::SystemManager => Yii::t('app', 'System Manager'),
        ];
    }

    public static function domainRoles()
    {
        return [
            self::SalesPerson     => Yii::t('app', 'Sales Person'),
            self::Cashier     => Yii::t('app', 'Cashier'),
            self::SalesManager  => Yii::t('app', 'Sales Manager'),
            self::Storekeeper     => Yii::t('app', 'Storekeeper'),
            self::StoresManager  => Yii::t('app', 'Stores Manager'),
            self::CustomerService    => Yii::t('app', 'Customer Service'),
            // self::Bookkeeper  => Yii::t('app', 'Bookkeeper'),
            // self::Accountant   => Yii::t('app', 'Accountant'),
        ];
    }
}