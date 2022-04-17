<?php

use app\modules\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/bakery/cake-order',
        'label' => 'Cake Order',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/bakery/bakery-order',
        'label' => 'Bakery Order',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/bakery/ingredient',
        'label' => 'Ingredient',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true,
    ],
    [
        'route' => '/bakery/product',
        'label' => 'Product',
        'icon' => 'shopping basket',
        'iconPath' => null,
        'iconColor' => 'orange',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/bakery/recipe',
        'label' => 'Recipe',
        'icon' => 'box',
        'iconPath' => null,
        'iconColor' => 'teal',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
];
?>