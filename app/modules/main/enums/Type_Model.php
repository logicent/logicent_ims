<?php

namespace app\modules\main\enums;

// Page

// use app\modules\main\models\Help;
use app\modules\main\models\auth\People;
use app\modules\main\models\Report;
use app\modules\setup\models\DataModel;
use app\modules\setup\models\EmailNotification;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\ReportBuilder;
use app\modules\setup\models\ReportBuilderItem;
use app\modules\setup\models\Setup;
use app\modules\setup\models\PrintFormat;
use app\modules\setup\models\PrintStyle;

// Data Model
// use app\models\PaymentEntry;
use logicent\accounts\models\Branch;
use logicent\accounts\models\Expense;
use logicent\accounts\models\ExpenseType;
use logicent\accounts\models\PaymentMethod;
use logicent\accounts\models\PriceList;
use logicent\accounts\models\PurchaseTaxCharge;
use logicent\accounts\models\SalesTaxCharge;
use logicent\accounts\models\PurchaseInvoice;
use logicent\accounts\models\PurchaseInvoiceItem;
use logicent\accounts\models\PurchaseInvoicePayment;
use logicent\accounts\models\SalesInvoice;
use logicent\accounts\models\SalesInvoiceItem;
use logicent\accounts\models\SalesInvoicePayment;
use logicent\purchase\models\PurchaseOrder;
use logicent\purchase\models\PurchaseOrderItem;
use logicent\purchase\models\PurchaseOrderPayment;
use logicent\purchase\models\Supplier;
use logicent\purchase\models\SupplierGroup;
use logicent\sales\models\Customer;
use logicent\sales\models\CustomerGroup;
use logicent\sales\models\SalesOrder;
use logicent\sales\models\SalesOrderItem;
use logicent\sales\models\SalesOrderPayment;
use logicent\sales\models\SalesPerson;
use logicent\sales\models\Quotation;
use logicent\sales\models\QuotationItem;
use logicent\stock\models\Brand;
use logicent\stock\models\Item;
use logicent\stock\models\ItemBundle;
use logicent\stock\models\ItemBundleItem;
use logicent\stock\models\ItemGroup;
use logicent\stock\models\ItemPrice;
use logicent\stock\models\ItemUom;
use logicent\stock\models\ItemWarehouse;
use logicent\stock\models\StockEntry;
use logicent\stock\models\StockEntryItem;
use logicent\stock\models\Warehouse;

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
    const Quotation        = 'Quotation';
    const SalesOrder        = 'Sales Order';
    const SalesPerson       = 'Sales Person';
    const SalesInvoice      = 'Sales Invoice';
    const SalesReturn       = 'Sales Return';
    const StockEntry        = 'Stock Entry';
    const Supplier          = 'Supplier';
    const SupplierGroup     = 'Supplier Group';
    const SalesTaxCharge    = 'Sales Tax Charge';
    const PurchaseTaxCharge = 'Purchase Tax Charge';
    const Warehouse         = 'Warehouse';

    const ItemBundleItem    =   'Item Bundle Item';
    const PurchaseOrderItem =   'Purchase Order Item';
    const PurchaseInvoiceItem   =   'Purchase Invoice Item';
    const QuotationItem    =   'Quotation Item';
    const SalesOrderItem    =   'Sales Order Item';
    const SalesInvoiceItem  =   'Sales Invoice Item';
    const StockEntryItem    =   'Stock Entry Item';
    const ReportBuilderItem =   'Report Builder Item';

    const PurchaseOrderPayment =   'Purchase Order Payment';
    const PurchaseInvoicePayment   =   'Purchase Invoice Payment';
    const SalesOrderPayment    =   'Sales Order Payment';
    const SalesInvoicePayment  =   'Sales Invoice Payment';

    const DataModel               = 'Data Model';
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
            self::Quotation        => self::Quotation,
            self::SalesOrder        => self::SalesOrder,
            self::SalesPerson       => self::SalesPerson,
            self::SalesInvoice      => self::SalesInvoice,
            self::StockEntry        => self::StockEntry,
            self::Supplier          => self::Supplier,
            self::SupplierGroup     => self::SupplierGroup,
            self::PurchaseTaxCharge => self::PurchaseTaxCharge,
            self::SalesTaxCharge    => self::SalesTaxCharge,
            self::Warehouse         => self::Warehouse,

            self::DataModel            => self::DataModel,
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
            self::Quotation        => Quotation::class,
            self::SalesOrder        => SalesOrder::class,
            self::SalesPerson       => SalesPerson::class,
            self::SalesInvoice      => SalesInvoice::class,
            self::StockEntry        => StockEntry::class,
            self::Supplier          => Supplier::class,
            self::SupplierGroup     => SupplierGroup::class,
            self::PurchaseTaxCharge => PurchaseTaxCharge::class,
            self::SalesTaxCharge    => SalesTaxCharge::class,
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
            self::QuotationItem        => QuotationItem::class,
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
            self::DataModel        => DataModel::class,
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