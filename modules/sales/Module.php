<?php

namespace crudle\ext\sales;

use Yii;

/**
 * sales module definition class
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
    public $controllerNamespace = 'crudle\ext\sales\controllers';

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
