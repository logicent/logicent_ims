<?php

namespace app\enums;

class Status_Transaction
{
    const Draft   = 'Draft';
    const Submit   = 'Submit';
    const Cancel  = 'Cancel';
    const Open  = 'Open';
    const Close  = 'Close';
    const Submitted   = 'Submitted';
    const Canceled  = 'Cancelled';
    const Closed  = 'Closed';

    const DraftColor    = 'red';
    const SubmittedColor= 'blue';
    const CanceledColor = 'brown';
    const OpenColor = 'orange';
    const ClosedColor = 'green';


    public static function enums()
    {
        return [
            self::Draft  =>  self::Draft,
            self::Submit   =>  self::Submit,
            self::Cancel =>  self::Cancel,
            self::Open =>  self::Open,
            self::Close =>  self::Close,
            self::Submitted   =>  self::Submitted,
            self::Canceled =>  self::Canceled,
            self::Closed =>  self::Closed,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::Draft  =>  self::DraftColor,
            self::Submitted   =>  self::SubmittedColor,
            self::Canceled  =>  self::CanceledColor,
            self::Open  =>  self::OpenColor,
            self::Closed  =>  self::ClosedColor,
        ];
    }
}