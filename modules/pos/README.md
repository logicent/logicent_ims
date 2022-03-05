AjabuPOS
=======

AjabuPOS is a enterprise business application for mini shops, retail stores and distribution outlets of small to medium sized companies.

The standard modules and features included are:

- Accounts/ing (Very basic i.e. AR/AP only. See our Roadmap for Accounts features still to come.)
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

CUSTOM REPORTS

- Report Builder

BUILT WITH
----------
[Yii2](https://yiiframework.com) and [SemanticUI](https://semantic-ui.com) running on MySQL

REQUIREMENTS
------------

The minimum requirements for this application that your Web server should support are:

- PHP 7.2+
- Yii2 2.0+
- MySQL 5.6

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
