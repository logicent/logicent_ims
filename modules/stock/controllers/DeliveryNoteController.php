<?php

namespace logicent\stock\controllers;

use app\controllers\base\BaseCrudController;
use logicent\stock\models\DeliveryNote;
use logicent\stock\models\DeliveryNoteSearch;

class DeliveryNoteController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = DeliveryNote::class;
        $this->modelSearchClass = DeliveryNoteSearch::class;

        return parent::init();
    }
}
