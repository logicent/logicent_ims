<?php

use app\modules\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/purchase/purchase-order/index',
        'label' => 'Purchase Order',
        'icon' => 'file outline',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/purchase/supplier/index',
        'label' => 'Supplier',
        'icon' => 'file outline',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/purchase/supplier-group/index',
        'label' => 'Supplier Group',
        'icon' => 'file outline',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/purchase/supplier-settings/index',
        'label' => 'Supplier Settings',
        'icon' => 'file outline',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Settings,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
];
?>