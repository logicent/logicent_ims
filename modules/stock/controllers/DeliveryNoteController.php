<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\DeliveryNote;
use crudle\ext\stock\models\DeliveryNoteSearch;

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
