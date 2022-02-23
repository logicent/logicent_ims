<?php

namespace logicent\stock\enums;

use Yii;

class Item_View
{
    const List  = 'List';
    const Image  = 'Image';

    public static function enums()
    {
        return [
            self::List => Yii::t('app', 'List'),
            self::Image => Yii::t('app', 'Image'),
        ];
    }
}