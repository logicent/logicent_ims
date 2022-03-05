<?php

namespace app\enums;

class Production_Status
{
    const NotStarted = 'Not Started';
    const InProgress = 'In Progress';
    const Finished   = 'Finished';
    const Spoilt     = 'Spoilt';

    const NotStartedColor = 'red';
    const InProgressColor = 'yellow';
    const FinishedColor   = 'green';
    const SpoiltColor     = 'brown';

    public static function enums()
    {
        return [
            self::NotStarted  =>  self::NotStarted,
            self::InProgress  =>  self::InProgress,
            self::Finished  =>  self::Finished,
            self::Spoilt  =>  self::Spoilt,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::NotStarted  =>  self::NotStartedColor,
            self::InProgress  =>  self::InProgressColor,
            self::Finished  =>  self::FinishedColor,
            self::Spoilt  =>  self::SpoiltColor,
        ];
    }
}