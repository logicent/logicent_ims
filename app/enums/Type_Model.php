<?php

namespace app\enums;

// Page
// use app\models\Help;
use app\models\Report;
use app\modules\setup\models\Setup;

use app\models\auth\People;
use app\modules\setup\models\EmailNotification;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\ReportBuilder;
use app\modules\setup\models\ReportBuilderItem;
use app\modules\setup\models\PrintFormat;
use app\modules\setup\models\PrintStyle;

// Data Model
// use app\models\PaymentEntry;
use modules\accounts\models\Branch;
use modules\accounts\models\Expense;
use modules\accounts\models\ExpenseType;
use modules\accounts\models\PaymentMethod;
use modules\accounts\models\PriceList;
use modules\accounts\models\TaxCharge;
use modules\accounts\modules\payable\models\PurchaseInvoice;
use modules\accounts\modules\payable\models\PurchaseInvoiceItem;
use modules\accounts\modules\payable\models\PurchaseInvoicePayment;
use modules\accounts\modules\receivable\models\SalesInvoice;
use modules\accounts\modules\receivable\models\SalesInvoiceItem;
use modules\accounts\modules\receivable\models\SalesInvoicePayment;
use modules\purchase\models\PurchaseOrder;
use modules\purchase\models\PurchaseOrderItem;
use modules\purchase\models\PurchaseOrderPayment;
use modules\purchase\models\Supplier;
use modules\purchase\models\SupplierGroup;
use modules\sales\models\Customer;
use modules\sales\models\CustomerGroup;
use modules\sales\models\SalesOrder;
use modules\sales\models\SalesOrderItem;
use modules\sales\models\SalesOrderPayment;
use modules\sales\models\SalesPerson;
use modules\sales\models\SalesQuote;
use modules\sales\models\SalesQuoteItem;
use modules\stock\models\Brand;
use modules\stock\models\Item;
use modules\stock\models\ItemBundle;
use modules\stock\models\ItemBundleItem;
use modules\stock\models\ItemGroup;
use modules\stock\models\ItemPrice;
use modules\stock\models\ItemUom;
use modules\stock\models\ItemWarehouse;
use modules\stock\models\StockEntry;
use modules\stock\models\StockEntryItem;
use modules\stock\models\Warehouse;

class Type_Model
{
    // Business Document Models
    const Branch            = 'Branch';
    const Brand             = 'Brand';
    const Customer          = 'Customer';
    const CustomerGroup     = 'Customer Group';
    const Expense           = 'Expense';
    const ExpenseType       = 'Expense Type';
    const Item              = 'Item';
    const ItemBundle        = 'Item Bundle';
    const ItemPrice         = 'Item Price';
    const PriceList         = 'Price List';
    const ItemGroup         = 'Item Group';
    const ItemUom           = 'Item Uom';
    const ItemWarehouse     = 'Item Warehouse';
    // const PaymentEntry      = 'Payment Entry';
    const PaymentMethod     = 'Payment Method';
    const PurchaseOrder     = 'Purchase Order';
    const PurchaseInvoice   = 'Purchase Invoice';
    const PurchaseReturn    = 'Purchase Return';
    const SalesQuote        = 'Sales Quote';
    const SalesOrder        = 'Sales Order';
    const SalesPerson       = 'Sales Person';
    const SalesInvoice      = 'Sales Invoice';
    const SalesReturn       = 'Sales Return';
    const StockEntry        = 'Stock Entry';
    const Supplier          = 'Supplier';
    const SupplierGroup     = 'Supplier Group';
    const TaxCharge         = 'Tax Charge';
    const Warehouse         = 'Warehouse';

    const ItemBundleItem    =   'Item Bundle Item';
    const PurchaseOrderItem =   'Purchase Order Item';
    const PurchaseInvoiceItem   =   'Purchase Invoice Item';
    const SalesQuoteItem    =   'Sales Quote Item';
    const SalesOrderItem    =   'Sales Order Item';
    const SalesInvoiceItem  =   'Sales Invoice Item';
    const StockEntryItem    =   'Stock Entry Item';
    const ReportBuilderItem =   'Report Builder Item';

    const PurchaseOrderPayment =   'Purchase Order Payment';
    const PurchaseInvoicePayment   =   'Purchase Invoice Payment';
    const SalesOrderPayment    =   'Sales Order Payment';
    const SalesInvoicePayment  =   'Sales Invoice Payment';

    // const EmailDigest           = 'Email Digest';
    const EmailNotification     = 'Email Notification';
    const EmailQueue            = 'Email Queue';
    // const EmailTemplate         = 'Email Template';
    const ReportBuilder         = 'Report Builder';
    const Role                  = 'Role';
    const PrintFormat           = 'Print Format';
    const PrintStyle            = 'Print Style';

    // Page (non-CRUD) models
    // const Help                  = 'Help';
    const People                = 'People';
    const Report                = 'Report';
    const Setup                 = 'Setup';

    public static function enums()
    {
        return [
            self::Branch            => self::Branch,
            self::Brand             => self::Brand,
            self::Customer          => self::Customer,
            self::CustomerGroup     => self::CustomerGroup,
            self::Expense           => self::Expense,
            self::ExpenseType       => self::ExpenseType,
            self::Item              => self::Item,
            self::ItemBundle        => self::ItemBundle,
            self::ItemPrice         => self::ItemPrice,
            self::PriceList         => self::PriceList,
            self::ItemGroup         => self::ItemGroup,
            self::ItemUom           => self::ItemUom,
            self::PaymentMethod     => self::PaymentMethod,
            self::PurchaseOrder     => self::PurchaseOrder,
            self::PurchaseInvoice   => self::PurchaseInvoice,
            self::SalesQuote        => self::SalesQuote,
            self::SalesOrder        => self::SalesOrder,
            self::SalesPerson       => self::SalesPerson,
            self::SalesInvoice      => self::SalesInvoice,
            self::StockEntry        => self::StockEntry,
            self::Supplier          => self::Supplier,
            self::SupplierGroup     => self::SupplierGroup,
            self::TaxCharge         => self::TaxCharge,
            self::Warehouse         => self::Warehouse,

            self::EmailNotification     => self::EmailNotification,
            self::EmailQueue            => self::EmailQueue,
            self::People                => self::People,
            self::ReportBuilder         => self::ReportBuilder,
            self::Role                  => self::Role,
            self::PrintFormat           => self::PrintFormat,
            self::PrintStyle            => self::PrintStyle,
            self::Setup                 => self::Setup,
        ];
    }

    public static function modelClasses()
    {
        return array_merge(self::domainModelClass(), self::coreModelClass());
    }

    public static function domainModelClass()
    {
        return [
            self::Branch            => Branch::class,
            self::Brand             => Brand::class,
            self::Customer          => Customer::class,
            self::CustomerGroup     => CustomerGroup::class,
            self::Expense           => Expense::class,
            self::ExpenseType       => ExpenseType::class,
            self::Item              => Item::class,
            self::ItemBundle        => ItemBundle::class,
            self::ItemGroup         => ItemGroup::class,
            self::ItemUom           => ItemUom::class,
            self::PaymentMethod     => PaymentMethod::class,
            self::PriceList         => PriceList::class,
            self::PurchaseOrder     => PurchaseOrder::class,
            self::PurchaseInvoice   => PurchaseInvoice::class,
            self::SalesQuote        => SalesQuote::class,
            self::SalesOrder        => SalesOrder::class,
            self::SalesPerson       => SalesPerson::class,
            self::SalesInvoice      => SalesInvoice::class,
            self::StockEntry        => StockEntry::class,
            self::Supplier          => Supplier::class,
            self::SupplierGroup     => SupplierGroup::class,
            self::TaxCharge         => TaxCharge::class,
            self::Warehouse         => Warehouse::class,
        ];
    }

    public static function domainModelSubclass()
    {
        return [
            self::ItemBundleItem        => ItemBundleItem::class,
            self::ItemPrice             => ItemPrice::class,
            self::ItemWarehouse         => ItemWarehouse::class,
            self::PurchaseOrderItem     => PurchaseOrderItem::class,
            self::PurchaseInvoiceItem   => PurchaseInvoiceItem::class,
            self::SalesQuoteItem        => SalesQuoteItem::class,
            self::SalesOrderItem        => SalesOrderItem::class,
            self::SalesInvoiceItem      => SalesInvoiceItem::class,
            self::StockEntryItem        => StockEntryItem::class,
            self::PurchaseOrderPayment     => PurchaseOrderPayment::class,
            self::PurchaseInvoicePayment   => PurchaseInvoicePayment::class,
            self::SalesOrderPayment        => SalesOrderPayment::class,
            self::SalesInvoicePayment      => SalesInvoicePayment::class,
        ];
    }

    public static function coreModelClass()
    {
        return [
            self::EmailNotification => EmailNotification::class,
            self::EmailQueue        => EmailQueue::class,
            self::People            => People::class,
            self::Report            => Report::class,
            self::PrintFormat       => PrintFormat::class,
            self::PrintStyle        => PrintStyle::class,
            self::ReportBuilder     => ReportBuilder::class,
            self::Setup             => Setup::class,
        ];
    }
}