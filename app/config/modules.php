<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_main', '@app_modules/main');
Yii::setAlias('@app_setup', '@app_modules/setup');
// @app_settings GeneralSettings + Layout Settings
Yii::setAlias('@system_modules', dirname (__DIR__, 2) . '/modules');
Yii::setAlias('@app_website', '@system_modules/website');
// Yii::setAlias('@custom_modules', dirname (__DIR__, 2) . '/user_modules');

return [
    // core modules
    'main'      => app\modules\main\Module::class,
    'setup'     => app\modules\setup\Module::class,
    // standard modules
    'accounts'  => logicent\accounts\Module::class,
    'bakery'    => logicent\bakery\Module::class,
    'fleet'     => logicent\fleet\Module::class,
    'hr'        => logicent\hr\Module::class,
    'pos'       => logicent\pos\Module::class,
    'production' => logicent\production\Module::class,
    'purchase'  => logicent\purchase\Module::class,
    'sales'     => logicent\sales\Module::class,
    'stock'     => logicent\stock\Module::class,
    'website'   => website\Module::class,
    // custom modules

];
