<?php

namespace app\enums;

// Page
// use app\models\Help;
use app\models\Report;
use app\models\Setup;
// Data Model
use app\models\Branch;
use app\models\Brand;
use app\models\Customer;
use app\models\CustomerGroup;
use app\models\setup\EmailNotification;
use app\models\setup\EmailQueue;
use app\models\Expense;
use app\models\Item;
use app\models\ItemBundle;
use app\models\ItemGroup;
use app\models\ItemPrice;
use app\models\ItemUom;
// use app\models\ItemWarehouse;
use app\models\PaymentMethod;
use app\models\auth\People;
use app\models\ExpenseType;
use app\models\PriceList;
// use app\models\PaymentEntry;
use app\models\PurchaseInvoice;
use app\models\PurchaseInvoiceItem;
use app\models\PurchaseInvoicePayment;
use app\models\PurchaseOrder;
use app\models\PurchaseOrderItem;
use app\models\PurchaseOrderPayment;
use app\models\setup\ReportBuilder;
use app\models\setup\ReportBuilderItem;
use app\models\SalesInvoice;
use app\models\SalesInvoiceItem;
use app\models\SalesInvoicePayment;
use app\models\SalesOrder;
use app\models\SalesOrderItem;
use app\models\SalesOrderPayment;
use app\models\SalesPerson;
use app\models\SalesQuote;
use app\models\SalesQuoteItem;
use app\models\StockEntry;
// use app\models\StockEntryItem;
use app\models\Supplier;
use app\models\TaxCharge;
use app\models\Warehouse;

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
    // const ItemWarehouse           = 'Item Warehouse';
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
    const TaxCharge         = 'Tax Charge';
    const Warehouse         = 'Warehouse';

    const PurchaseOrderItem =   'Purchase Order Item';
    const PurchaseInvoiceItem   =   'Purchase Invoice Item';
    const SalesQuoteItem    =   'Sales Quote Item';
    const SalesOrderItem    =   'Sales Order Item';
    const SalesInvoiceItem  =   'Sales Invoice Item';
    // const StockEntryItem    =   'Stock Entry Item';
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
    // const ReportAutoEmail       = 'Report Auto Email';
    const Role                  = 'Role';

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
            self::TaxCharge         => self::TaxCharge,
            self::Warehouse         => self::Warehouse,

            self::EmailNotification     => self::EmailNotification,
            self::EmailQueue            => self::EmailQueue,
            self::People                => self::People,
            self::ReportBuilder         => self::ReportBuilder,
            self::Role                  => self::Role,
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
            self::ItemPrice         => ItemPrice::class,
            self::ItemGroup         => ItemGroup::class,
            self::ItemUom           => ItemUom::class,
            // self::ItemWarehouse     => ItemWarehouse::class,
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
            self::TaxCharge         => TaxCharge::class,
            self::Warehouse         => Warehouse::class,
        ];
    }

    public static function domainModelSubclass()
    {
        return [
            // self::ItemBundle        => ItemBundle::class,
            // self::ItemPrice         => ItemPrice::class,
            // self::ItemGroup         => ItemGroup::class,
            // self::ItemUom           => ItemUom::class,
            // self::ItemWarehouse     => ItemWarehouse::class,
            self::PurchaseOrderItem     => PurchaseOrderItem::class,
            self::PurchaseInvoiceItem   => PurchaseInvoiceItem::class,
            self::SalesQuoteItem        => SalesQuoteItem::class,
            self::SalesOrderItem        => SalesOrderItem::class,
            self::SalesInvoiceItem      => SalesInvoiceItem::class,
            // self::StockEntryItem        => StockEntryItem::class,
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
            self::ReportBuilder     => ReportBuilder::class,
            self::Setup             => Setup::class,
        ];
    }
}