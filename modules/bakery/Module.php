<?php

namespace crudle\ext\bakery;

use Yii;

/**
 * bakery module definition class
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
    public $controllerNamespace = 'crudle\ext\bakery\controllers';

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
