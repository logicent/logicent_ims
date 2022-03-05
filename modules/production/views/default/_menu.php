<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/production/work-order',
        'label' => 'Work Order',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Production,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
];
?>