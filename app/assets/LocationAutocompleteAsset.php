<?php

namespace app\assets;

use yii\web\AssetBundle;

class LocationAutocompleteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        "js/location-autocomplete.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
