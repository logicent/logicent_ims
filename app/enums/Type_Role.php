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
    const SalesUser = 'Sales Assistant';
    const SalesManager = 'Sales Manager';
    const CustomerMaster = 'Customer Master';
    const StockUser = 'Stock Assistant';
    const ItemMaster = 'Item Master';
    const StockManager = 'Stock Manager';
    const PurchaseUser = 'Purchase Assistant';
    const PurchaseManager = 'Purchase Manager';
    const SupplierMaster = 'Supplier Master';
    // const AccountsUser = 'Accounts Assistant';
    // const AccountsManager = 'Accounts Manager';

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
            self::SalesUser     => Yii::t('app', 'Sales Assistant'),
            self::SalesManager  => Yii::t('app', 'Sales Manager'),
            self::PurchaseUser  => Yii::t('app', 'Purchase Assistant'),
            self::PurchaseManager   => Yii::t('app', 'Purchase Manager'),
            self::StockUser     => Yii::t('app', 'Stock Assistant'),
            self::StockManager  => Yii::t('app', 'Stock Manager'),
            self::ItemMaster    => Yii::t('app', 'Item Master'),
            self::CustomerMaster    => Yii::t('app', 'Customer Master'),
            self::SupplierMaster    => Yii::t('app', 'Supplier Master'),
            // self::AccountsUser  => Yii::t('app', 'Accounts Assistant'),
            // self::AccountsManager   => Yii::t('app', 'Accounts Manager'),
        ];
    }
}