**_Note: This is a beta version of the software. You are advised to proceed with caution!_**

**Overview**

A free and open-source point-of-sale (POS) system for retail and wholesale businesses with support for multiple branches, stockkeeping locations, POS profiles and price lists.

**Installation**

Prerequisites
- Git
- Composer
- NPM

via CLI
- Clone the github repo `git@github.com:mwaigichuhi/ajabu-pos.git && cd ajabu-pos`
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
- Semantic UI 2.4
- jQuery
- Datatables 1.10
- Flatpickr 4.6
- SweetAlert 2.1

**Modules**
- Buying (Purchases)
  - Purchase Order [+ Goods Receipt]
  <!-- - Landed Cost Voucher -->

- Stock (Item)
  - Stock Entry (Item Movement)
  - Purchase (Material) Request
  - Delivery Note
  - Item + Item Warehouse
  - Item Group
  - Item UoM
  - Brand
  - Item Bundle (Item Kit)
  - Warehouse  (Locations)

- Selling (Sales)
  - Quotation
  - Sales Order
  - Customer Group
  - POS Profile (single)
  - Sales Person

- Accounting (_a basic, functional, but limited implementation_)
  - Sales Invoice (A/R)
  - Sales Return (Credit Note)
  - Purchase Invoice (A/P)
  - Purchase Return (Debit Note)
  - Expenses (Petty Cash Voucher)
  - Branch
  - Payment method
  - Price list & Item price
  - Tax & Charge (Sales and Purchases)

**Setup (Settings)**
  - Business profile
  - Email notifications
  - Email queue
  - General settings
  - Role & permissions

**Tools**

- Data import
- Database backup
- Integration (Enterprise only)
  - Mobile money payment
  - SMS Gateway
- Report builder
- SMTP settings

**Roadmap**

_Now:_

- [ ] Add direct printing support with default/user-defined settings
- [ ] Re-implement item search to use a custom search bar (input term + dropdown list of search result)
- [ ] Email sending with attachment option for documents and reports
- [ ] Refactor all business domain "modules" above as Yii modules

Enterprise only
- [ ] Email templates and email digest of recent business activity

_Next:_

- [ ] Improve all the end-user system tools options and performance
- [ ] Add support for keyboard shortcuts in the POS/POR transactions
- [ ] Upgrade to latest Yii2 using PHP 8+ and MySQL 8+ with Fomantic UI 2.8+
- [ ] Change the UI layout to full-width with primary and secondary sidebars
- [ ] Create Yii extensions for the tools and starter kit as composer packages

Enterprise only
- [ ] Add multiple POS profile support with active profile switcher
- [ ] Add integration for mobile money payments and SMS gateways
- [ ] Add Coupon discount in sale and Gift Voucher as payment method
- [ ] Add Customer Loyalty points tracker and promotions messages

_Later:_

- [ ] Upgrade to Yii3 (with CycleORM datamapper) using Bulma and AlpineJS
- [ ] Test and prefer RoadRunner over Nginx for production in Ubuntu 20.04+

**Want to contribute?**
Thank you for considering to make a contribution to Ajabu POS.
New contributors to improve the solution further or help provide support to issues are most welcome.

**License**
Ajabu POS is released under the [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).