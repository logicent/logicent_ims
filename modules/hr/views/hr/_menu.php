<?php

use app\modules\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/hr/employee',
        'label' => 'Employee',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/hr/employee-attendance',
        'label' => 'Employee Attendance',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/hr/employee-timesheet',
        'label' => 'Employee Timesheet',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true,
    ],
    [
        'route' => '/hr/leave-application',
        'label' => 'Leave Application',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true,
    ],
];
?>