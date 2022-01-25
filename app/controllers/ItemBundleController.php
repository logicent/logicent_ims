<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\ItemBundle;
use app\models\ItemBundleItem;

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
