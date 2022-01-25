<?php

namespace app\enums;

use Yii;

class Message_Integration
{
    const Ussd  = 'USSD';
    const Sms   = 'SMS';

    public static function enums()
    {
        return [
            self::Ussd  => self::Ussd,
            self::Sms  => self::Sms,
        ];
    }
}
