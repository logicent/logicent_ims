<?php

namespace app\enums;

use Yii;

class Type_Device
{
    const BarcodeScanner        = 'BS';
    const ThermalPrinter        = 'TP';
    const FiscalPrinter         = 'FP';
    const ElectronicSignatureDevice    = 'ESD';
    const FingerPrintScanner    = 'FPS';

    public static function enums()
    {
        return [
            self::BarcodeScanner        => Yii::t('app', 'Barcode Scanner'),
            self::ThermalPrinter        => Yii::t('app', 'Thermal Printer'),
            self::FiscalPrinter         => Yii::t('app', 'Fiscal Printer'),
            self::ElectronicSignatureDevice     => Yii::t('app', 'Electronic Signature Device'),
            self::FingerPrintScanner    => Yii::t('app', 'Finger Print Scanner'),
        ];
    }
}
