<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\stock\models\ItemBundle;
use logicent\stock\models\ItemBundleItem;

class ItemBundleController extends BaseSetupCrudController
{
    public $itemModelClass;

    public function init()
    {
        $this->modelClass = ItemBundle::class;
        $this->itemModelClass = ItemBundleItem::class;

        return parent::init();
    }
}
