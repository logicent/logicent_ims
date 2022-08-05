<?php

namespace logicent\accounts\enums;

use Yii;

class Type_Sub_Module
{
    const AccountsPayable  = 'AP';
    const AccountsReceivable  = 'AR';
    const FinancialStatements  = 'FS';

    public static function enums()
    {
        return [
            self::AccountsPayable => Yii::t('app', 'Accounts Payable'),
            self::AccountsReceivable => Yii::t('app', 'Accounts Receivable'),
            self::FinancialStatements => Yii::t('app', 'Financial Statements'),
        ];
    }

    public static function enumsLabel()
    {
        return [
        ];
    }
}