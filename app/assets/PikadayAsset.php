<?php

namespace app\assets;

use yii\web\AssetBundle;

class PikadayAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        "css/pikaday/pikaday.css",
        "css/pikaday/site.css",
        "css/pikaday/theme.css",
        "css/pikaday/triangle.css",
    ];
    public $js = [
        "js/moment/moment.js",
        "js/pikaday/pikaday.js",
    ];
}
