<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_customize', dirname( __DIR__ ) . '/modules/customize');
Yii::setAlias('@app_setup', dirname( __DIR__ ) . '/modules/setup');
Yii::setAlias('@app_website', dirname( __DIR__ ) . '/modules/website');
Yii::setAlias('@system_modules', dirname (dirname( __DIR__ )) . '/modules');
// Yii::setAlias('@custom_modules', dirname (dirname( __DIR__ )) . '/user_modules');

return [
    'setup' => [
        'class' => \app\modules\setup\Module::class,
    ],
    'customize' => [
        'class' => app\modules\customize\Module::class,
    ],
    'website' => [
        'class' => app\modules\website\Module::class,
    ],
    'accounts' => [
        'class' => logicent\accounts\Module::class,
    ],
    'purchase' => [
        'class' => logicent\purchase\Module::class,
    ],
    'fleet' => [
        'class' => logicent\fleet\Module::class,
    ],
    'sales' => [
        'class' => logicent\sales\Module::class,
    ],
    'hr' => [
        'class' => logicent\hr\Module::class,
    ],
    'production' => [
        'class' => logicent\production\Module::class,
    ],
    'bakery' => [
        'class' => logicent\bakery\Module::class,
    ],
    'pos' => [
        'class' => logicent\pos\Module::class,
    ],
    'stock' => [
        'class' => logicent\stock\Module::class,
    ],
];
