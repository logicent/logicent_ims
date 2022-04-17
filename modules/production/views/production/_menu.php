<?php

use app\modules\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/production/work-order',
        'label' => 'Work Order',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
];
?>