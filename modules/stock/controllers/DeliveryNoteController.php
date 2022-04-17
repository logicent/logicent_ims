<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\DeliveryNote;
use logicent\stock\models\DeliveryNoteSearch;

class DeliveryNoteController extends BaseCrudController
{
    public function modelClass(): string
    {
        return DeliveryNote::class;
    }

    public function searchModelClass(): string
    {
        return DeliveryNoteSearch::class;
    }
}
