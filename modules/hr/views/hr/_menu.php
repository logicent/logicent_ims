<?php

use crudle\setup\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/hr/employee/index',
        'label' => 'Employee',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::MasterData,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/hr/employee-attendance/index',
        'label' => 'Employee Attendance',
        'icon' => 'user',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true, // Yii::$app->user->can(Type_Role::Baker),
    ],
    [
        'route' => '/hr/employee-timesheet/index',
        'label' => 'Employee Timesheet',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true,
    ],
    [
        'route' => '/hr/leave-application/index',
        'label' => 'Leave Application',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Menu_Group::Transactions,
        'visible' => true,
    ],
];
?>