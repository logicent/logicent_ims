<?php

namespace app\enums;

use Yii;

class Type_Device
{
    const BarcodeScanner        = 'Barcode Scanner';
    const ThermalPrinter        = 'Thermal Printer';
    const FiscalPrinter         = 'Fiscal Printer';
    const ElectronicSignatureDevice    = 'Electronic Signature Device';
    const FingerPrintScanner    = 'Finger Print Scanner';

    public static function enums()
    {
        return [
            self::BarcodeScanner        => self::BarcodeScanner,
            self::ThermalPrinter        => self::ThermalPrinter,
            self::FiscalPrinter         => self::FiscalPrinter,
            self::ElectronicSignatureDevice     => self::ElectronicSignatureDevice,
            self::FingerPrintScanner    => self::FingerPrintScanner,
        ];
    }
}
