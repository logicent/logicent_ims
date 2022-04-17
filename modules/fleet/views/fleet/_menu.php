<?php

use app\modules\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/fleet/vehicle',
        'label' => 'Vehicle',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/fleet/vehicle-log',
        'label' => 'Vehicle Log',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/fleet/vehicle-service',
        'label' => 'Vehicle Service',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true,
    ],
];
?>