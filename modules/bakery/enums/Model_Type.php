<?php

namespace app\enums;
// Page
use app\controllers\Setup;
// Data Model
use app\models\BakeryIngredient;
use app\models\Customer;
use app\models\DocType;
use app\models\EmailNotificationSettingsForm;
use app\models\EmailQueue;
use app\models\People;
use app\models\PurchaseInvoice;
use app\models\PurchaseOrder;
use app\models\ReportBuilder;
use app\models\SalesInvoice;
use app\models\SalesOrder;
use app\models\SalesQuote;
use app\models\StockItem;
use app\models\StockItemGroup;
use app\models\Supplier;

// use app\models\SmtpSettingsForm;

class Model_Type
{
    // Business Document Models
    const Product           = 'Product';
    const Ingredient        = 'Bakery Ingredient';
    const Recipe            = 'Recipe';

    public static function enums()
    {
        return [
            self::Product           => self::Product,
            self::Ingredient        => self::Ingredient,
            self::Recipe            => self::Recipe,
        ];
    }

    public static function modelClasses()
    {
        return [
            self::Product           => Product::class,
            self::Ingredient        => BakeryIngredient::class,
            self::Recipe            => Recipe::class,
        ];
    }
}