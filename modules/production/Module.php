<?php

namespace crudle\ext\production;

use Yii;

/**
 * production module definition class
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
    public $controllerNamespace = 'crudle\ext\production\controllers';

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
