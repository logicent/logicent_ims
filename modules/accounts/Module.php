<?php

namespace logicent\accounts;

/**
 * accounts module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'logicent\accounts\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        $this->modules = [
            'payable' => [
                'class' => \logicent\accounts\payable\Module::class,
            ],
            'receivable' => [
                'class' => 'modules\accounts\modules\receivable\Module',
                // \logicent\accounts\receivable\Module::class
            ],
        ];
    }
}
