<?php

namespace logicent\enums;

use Yii;

class Type_Stock_Entry
{
    const OpeningBalance    = 'OB'; // to warehouse
    const StockAdjustment   = 'SA'; // to warehouse i.e. Reconciliation

    // const ItemIssue     = 'II'; // from warehouse
    // const ItemReceipt   = 'IR'; // to warehouse
    const ItemTransfer      = 'IT'; // from/to warehouse
    const ItemProduction    = 'IP'; // to warehouse
    const ItemConsumedInProduction  = 'CIP'; // from/to warehouse
    const ItemTransferToProduction  = 'TTP'; // from/to warehouse
    const Repack            = 'RP'; // from/to warehouse

    public static function enums()
    {
        return [
            // self::ItemIssue     => Yii::t('app', 'Item issue'),
            // self::ItemReceipt   => Yii::t('app', 'Item receipt'),
            self::ItemTransfer  => Yii::t('app', 'Item transfer'),
            self::ItemProduction    => Yii::t('app', 'Item production'),
            self::ItemConsumedInProduction  => Yii::t('app', 'Item consumed in production'),
            self::ItemTransferToProduction  => Yii::t('app', 'Item transfer to production'),
            self::Repack            => Yii::t('app', 'Item repack'),

            self::OpeningBalance    => Yii::t('app', 'Opening balance'),
            self::StockAdjustment   => Yii::t('app', 'Stock adjustment'),
        ];
    }
}