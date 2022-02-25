**_Note: This is a beta version of the software. You are advised to proceed with caution!_**

**Overview**

A free and open-source enterprise software application for your accounting and/or production needs in tiny to small business, institutional and non-profit organizations with useful tools and integrations.

**Installation**

Prerequisites
- Git
- Composer
- NPM

Option 1: via Composer
- Run `composer create-project logicent/logicent && cd logicent`

Option 2: via CLI
- Clone this repo `git@github.com:logicent/logicent.git && cd logicent`

Continue:
- Run `composer install`
- Run `npm install -g bower && npm install -g bower-npm-resolver`
- Run `bower install`
- Create a database and update your `.env` settings
- Run `./yii migrate --migration-path 'app/database/migrations'`
- Run `cat app/database/seeds/people.sql | mysql -u your_root_user -p your_db_name`
- Run `./yii user/create-superuser "my_password"` and `./yii rbac/init`
- Run `./yii serve` in local environment or use preferred web server in production

**System Requirements**

- PHP 7.4 using Yii2 (latest) and JavaScript using jQuery (latest)
- MySQL 5.7

**Modules**
- Purchase
  - Purchase Request
  - Purchase Order

- Stock (Item)
  - Purchase (Material) Request
  - Purchase (Goods) Receipt
  - Stock Entry (Item Movement)
  - Delivery Note
  - Item + Item Warehouse
  - Item Group
  - Item UoM
  - Brand
  - Item Bundle (Item Kit)
  - Warehouse (Locations)

- Sales
  - Quotation
  - Sales Order
  - Customer Group
  - POS Profile
  - Sales Person

- Accounting _(a basic, functional, but limited implementation)_
  - Sales (A/R) Invoice
  - Sales Return (Credit Note)
  - Purchase (A/P) Invoice
  - Purchase Return (Debit Note)
  - Expenses (Petty Cash Voucher)
  - Branch
  - Payment method
  - Price list & Item price
  - Tax & Charge (Sales and Purchases)

**Setup**

- Accounts Settings
- Stock Settings
- Customer Settings
- Supplier Settings

**Tools**
_(Enterprise only)_
- Integration
  - Mobile money payment
  - SMS Gateway

**Roadmap**

_Now:_

- [ ] Add direct printing support with default/user-defined settings
- [x] Re-implement item search to use a custom search bar (input term + dropdown list of search result)
- [x] Refactor all business domain "modules" above as Yii modules

_Next:_

- [ ] Add integration for mobile money payments and SMS gateways
- [ ] Add multiple POS profile support with active profile switcher

_Later:_

- [ ] Add support for keyboard shortcuts in the POS/POR transactions
- [ ] Add Coupon discount in sale and Gift Voucher as payment method
- [ ] Add Customer Loyalty points tracker and promotions messages

**Want to contribute?**
Thank you for considering to make a contribution to Logicent.
New contributors to improve the solution further or help provide support to issues are most welcome.

**License**
Logicent is released under the [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).