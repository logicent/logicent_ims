<?php

namespace app\enums;

class Type_Module_Sub_Module
{
    const PoS  = 'PoS';
    const AccountsPayable      = 'Accounts Payable';
    const AccountsReceivable   = 'Accounts Receivable';
    const Tool  = 'Tool';

    public static function enums()
    {
        return [
            self::PoS => self::PoS,
            self::AccountsPayable => self::AccountsPayable,
            self::AccountsReceivable => self::AccountsReceivable,
            self::Tool => self::Tool,
        ];
    }
}