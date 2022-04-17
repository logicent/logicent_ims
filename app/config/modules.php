<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_main', '@app_modules/main');
Yii::setAlias('@app_setup', '@app_modules/setup');
// @app_settings GeneralSettings + Layout Settings
Yii::setAlias('@system_modules', dirname (__DIR__, 2) . '/modules');
Yii::setAlias('@app_website', '@system_modules/website');
// Yii::setAlias('@custom_modules', dirname (__DIR__, 2) . '/user_modules');

return [
    'main'      => app\modules\main\Module::class,
    'setup'     => [
        'class' => app\modules\setup\Module::class,
    ],
    'website'   => website\Module::class,
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
