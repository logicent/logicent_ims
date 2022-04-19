<?php

namespace app\controllers\production;

use app\models\production\WorkOrder;
use app\models\production\WorkOrderSearch;
use app\models\production\WorkOrderItem;
use crudle\main\controllers\base\BaseCrudController;

class WorkOrderController extends BaseCrudController
{
    public function init()
    {
        $this->modelNamespace = 'app\models\production';

        parent::init();
    }
}
