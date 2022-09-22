<?php

namespace crudle\ext;

use Yii;

/**
 * base module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $moduleName;
    /**
     * {@inheritdoc}
     */
    public $isInstalled = false; // if db migrations have run
    /**
     * {@inheritdoc}
     */
    public $isActivated = false; // will be loaded in app run
    /**
     * {@inheritdoc}
     */
    public $activationRule = [];
    /**
     * {@inheritdoc}
     */
    public $isTranslatable = false; // if translation resource exists
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        // Yii::configure($this, require __DIR__ . '/config.php');
    }

    /**
     * {@inheritdoc}
     */
    // public function bootstrap($app)
    // {
    //     if ($app instanceof \yii\web\Application) {
    //         $app->getUrlManager()->addRules([
    //             ['class' => 'yii\web\UrlRule', 'pattern' => '/' , 'route' => $this->id . '/index'],
    //         ], false);
    //     }
    //     // elseif ($app instanceof \yii\console\Application) {
    //     //     $app->controllerMap[$this->id] = [
    //     //         'class' => "crudle\{$this->id}\console\_Controller",
    //     //         'module' => $this,
    //     //     ];
    //     // }
    // }
}
