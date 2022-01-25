<?php

namespace app\enums;

class Status_Work
{
    const OnDuty = 'On duty';
    const OffDuty = 'Off duty';
    const SickLeave = 'Sick leave';

    public static function enums()
    {
        return [
            self::OnDuty => self::OnDuty,
            self::OffDuty => self::OffDuty,
            self::SickLeave => self::SickLeave,
        ];
    }
}