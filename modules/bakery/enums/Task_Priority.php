<?php

namespace app\enums;

use Yii;

class Task_Priority
{
    const None      = 10;
    const Low       = 9;
    const Medium    = 5;
    const High      = 1;
    // const Critical  = 0; // Zero
    // const NotSet    = -1;

    public static function enums()
    {
        return [
            // self::Critical  => Yii::t('app', 'Critical'),
            // self::NotSet   => Yii::t('app', 'Not Set'),
            self::None   => Yii::t('app', 'None'),
            self::Low    => Yii::t('app', 'Low'),
            self::Medium => Yii::t('app', 'Medium'),
            self::High   => Yii::t('app', 'High'),
        ];
    }
}