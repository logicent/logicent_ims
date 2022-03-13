AjabuPOS
=======

AjabuPOS is a enterprise business application for mini shops, retail stores and distribution outlets of small to medium sized companies.

The standard modules and features included are:

- Accounts
- Buying
- Stock
- Selling

TECHNICAL GOALS
---------------

- DRY and SOLID principles in code implementation - as much as possible.
- 12-factor web development - selectively.
- Cloud backups integration for S3 and Digital Ocean.
- Peachpie (.NET) for Windows
- CLI, API, UI, Migration, Schema, Relations

SYSTEM MAINTENANCE
------------------

- Monitoring and Control
- Extensibility and Flexibility
- Refactoring and Enhancements
- Optimizations of Performance

CUSTOMIZATION
-------------

- Add custom data models/forms
- Insert custom fields in standard forms
- Add custom Print Formats
- Add custom work flows
- Add custom reports

DATA SECURITY
-------------

- Document (general) to field (specific)
- Icons to reports
- Work flows to Print Formats

EMAIL ALERTS
------------

- Communication and Reminders

STANDARD REPORTS

- Stock Balance
- Stock Ledger (Stock Movement) - filter by opening/closing
- Stock Valuation by Cost/Rate

- Sales Register (Customer Statement)
- Sales Register Item-wise
- Sales Summary - filter by opening/closing

- Purchase Register (Supplier Statement)
- Purchase Register Item-wise
- Purchase Summary - filter by opening/closing

INSTALLATION
------------

### Install via Composer

You can then install this project template using the following command:

~~~
php composer.phar create-project --prefer-dist --stability=dev ajabupos/ajabupos-app myajabupos
~~~

Now you should be able to access the application through the following URL, assuming `myajabupos` is the directory under the Web root.

~~~
http://localhost/ajabupos
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=myajabupos',
    'username' => 'dbuser',
    'password' => 'secret',
    'charset' => 'utf8',
];
```

**NOTES:**

- TODO:

TESTING
-------

Not tests have been written for this application. Any help with this is readily welcome.

***

point of sale (POS)
point of receive (POR)

goods/stock/items

**saleType        = Cash sale**
is_pos          = true (POSInvoice)
update_stock    = 1
status          = submitted (print Delivery Note optional)
paid_status     = paid (print Cash Sale Receipt)
paid_amount     = total amount
change_amount   >= 0 (overpayment is change amount)
next status     = Cancel


**saleType      = Credit sale**
customer_id is required
due_date        = credit days (default is 30 days)
is_pos          = false (SalesInvoice or SalesOrder)
update_stock    = 1
status          = submitted (print Delivery Note optional)
paid_status     = unpaid (print Credit Sale Receipt)
paid_amount     = 0 if full credit
balance_amount  >= total_amount
next status     = Cancel

_payment can be added if partial payment is supported_
_paid amount less than total amount if partial credit is supported_
_zero balance in partial payment is allowed or switched to Cash Sale?_
_overpayment is credited to customer account via negative balance amount_

**how should customer credit limits be handled in sale**
- ignored
- warning displayed to cashier/user
- sale blocked/adjusted accordingly


**saleType = Advance (payment) sale / Proforma Invoice i.e. Sales Order + (Advance) Payment (Deposit/Billed Amount)**
customer_id is required
deposit_amount is required
is_pos          = true (SalesInvoice or SalesOrder)
update_stock    = 1
status          = submitted
paid_status     = partly paid
paid_amount     = deposit_amount
balance_amount  = total_amount - deposit_amount
next status = Cancel

_payment can be added later_
_overpayment is credited to customer account via negative balance amount_


**saleType = Return sale**
is_return       = true
returned_against is required
is_pos          = false
update_stock    = 1 (reverse the stock quantities)
status          = submitted
paid_status     = paid/unpaid
balance_amount  = (-total_amount) - only reverse if paid
next status = Cancel

_if (paid_amount > 0) credit customer account balance_
_no new payment should be captured_
_no new items should be captured_


Print format is form view with some modifications and a wrapper around the print preview


**saleType = Hold sale (temporary until day/session end)**
status = Draft
paid_status = Unpaid

**saleType = Cancel sale (clear if not saved or delete if saved)**
status = Draft
paid_status = Unpaid


purchaseType = Cash purchase (Receive Goods)

purchaseType = Credit purchase (Receive Goods)

purchaseType = Return purchase (Return Goods)


Stock Entry for Opening Balance (OB) or item transfer
**batch import is allowed