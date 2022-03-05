<?php

namespace app\enums;

use Yii;

class Task_Progress
{
    const Zero      = 0; // None
    const Ten       = 10;
    const Twenty    = 20;
    const Thirty    = 30;
    const Forty     = 40;
    const Fifty     = 50;
    const Sixty     = 60;
    const Seventy   = 70;
    const Eighty    = 80;
    const Ninety    = 90;
    const Hundred   = 100; // Done

    public function enums()
    {
        return [
            self::Zero    =>  Yii::t('app', '0%'),
            self::Ten     =>  Yii::t('app', '10%'),
            self::Twenty  =>  Yii::t('app', '20%'),
            self::Thirty  =>  Yii::t('app', '30%'),
            self::Forty   =>  Yii::t('app', '40%'),
            self::Fifty   =>  Yii::t('app', '50%'),
            self::Sixty   =>  Yii::t('app', '60%'),
            self::Seventy =>  Yii::t('app', '70%'),
            self::Eighty  =>  Yii::t('app', '80%'),
            self::Ninety  =>  Yii::t('app', '90%'),
            self::Hundred =>  Yii::t('app', '100%'),
        ];
    }
}