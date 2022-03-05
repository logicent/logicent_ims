<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/bakery/cake-order',
        'label' => 'Cake Order',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Bakery,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/bakery/bakery-order',
        'label' => 'Bakery Order',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Bakery,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/bakery/ingredient',
        'label' => 'Ingredient',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module::Bakery,
        'visible' => true,
    ],
    [
        'route' => '/bakery/product',
        'label' => 'Product',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Module::Bakery,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/bakery/recipe',
        'label' => 'Recipe',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Module::Bakery,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
];
?>