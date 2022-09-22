<?php

namespace crudle\ext\stock;

use Yii;

/**
 * stock module definition class
 */
class Module extends \crudle\ext\Module
{
    /**
     * {@inheritdoc}
     */
    public $isActivated = true; // will be loaded in app run
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\ext\stock\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
