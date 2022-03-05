<?php

use app\enums\Permission_Type;
use app\enums\Model_Type;
use app\enums\Module_Type;
use app\models\DeveloperSettingsForm;
use app\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => 'sales-quote/index',
        'label' => 'Sales Quote', // Model_Type::SalesQuote,
        'icon' => null,
        'iconPath' => 'img/Management/png/ringing.png',
        'iconColor' => 'green',
        'group' => Module_Type::Selling,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::SalesQuote),
    ],
    [
        'route' => 'customer/index',
        'label' => 'Customer', // Model_Type::Customer,
        'icon' => null,
        'iconPath' => 'img/Bakery/png/boy.png',
        'iconColor' => null,
        'group' => Module_Type::Selling,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Customer),
    ],
    [
        'route' => 'sales-order/index',
        'label' => 'Sales Order', // Model_Type::SalesOrder,
        'icon' => null,
        'iconPath' => 'img/Bakery/png/baker.png',
        'iconColor' => null,
        'group' => Module_Type::Selling,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::SalesOrder),
    ],
    [
        'route' => 'bakery-order/index',
        'label' => 'Bakery Order', // Model_Type::BakeryOrder,
        'icon' => null,
        'iconPath' => 'img/Bakery/png/pastry-chef.png',
        'iconColor' => null,
        'group' => Module_Type::Selling,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::BakeryOrder),
    ],
    [
        'route' => 'recipe/index',
        'label' => 'Recipe', // Model_Type::Recipe,
        'icon' => null,
        'iconPath' => 'img/Kitchen/png/recipe-2.png',
        'iconColor' => 'orange',
        'group' => Module_Type::Selling,
        'visible' => false, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Recipe),
    ],
    [
        'route' => 'product/index',
        'label' => 'Product', // Model_Type::Product,
        'icon' => null,
        'iconPath' => 'img/Bakery/png/cake-1.png',
        'iconColor' => 'teal',
        'group' => Module_Type::Stock,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Product),
    ],
    [
        'route' => 'purchase-order/index',
        'label' => 'Purchase Order', // Model_Type::PurchaseOrder,
        'icon' => null,
        'iconPath' => 'img/Management/png/checklist.png',
        'iconColor' => null,
        'group' => Module_Type::Buying,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::PurchaseOrder),
    ],
    [
        'route' => 'supplier/index',
        'label' => 'Supplier', // Model_Type::Supplier,
        'icon' => null,
        'iconPath' => 'img/Management/png/trucking.png',
        'iconColor' => 'yellow',
        'group' => Module_Type::Buying,
        'visible' => true, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Supplier),
    ],
    [
        'route' => 'ingredient/index',
        'label' => 'Ingredient', // Model_Type::Ingredient,
        'icon' => null,
        'iconPath' => 'img/Kitchen/png/wheat.png',
        'iconColor' => null,
        'group' => Module_Type::Selling,
        'visible' => false, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Ingredient),
    ],
    [
        'route' => 'stock/index',
        'label' => 'Stock', // Module_Type::Stock,
        'icon' => null,
        'iconPath' => 'img/Management/png/packing-2.png',
        'iconColor' => null,
        'group' => Module_Type::Stock,
        'visible' => false, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Item),
    ],
    [
        'route' => 'report/index',
        'label' => 'Report',
        'icon' => 'wizard',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Module_Type::System,
        'visible' => false, //Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Report),
    ],
    [
        'route' => 'people/index',
        'label' => Model_Type::People,
        'icon' => null,
        'iconPath' => 'img/Management/png/id-card.png',
        'iconColor' => 'green',
        'group' => Module_Type::System,
        'visible' => false, // Yii::$app->user->can(Permission_Type::List .' '. Model_Type::People),
    ],
    [
        'route' => 'setup/index',
        'label' => Model_Type::Setup,
        'icon' => null,
        'iconPath' => 'img/Bakery/png/bakery-shop.png',
        'iconColor' => null,
        'group' => Module_Type::System,
        'visible' => Yii::$app->user->can(Permission_Type::List .' '. Model_Type::Setup),
    ],
];
?>