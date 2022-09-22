<?php

namespace crudle\ext\bakery\models;

use app\enums\Person_Status;
use Yii;
use yii\helpers\ArrayHelper;
use app\models\BakeryCost;
use crudle\ext\stock\models\Item;

/**
 * This is the model class for table "stock_item".
 *
 * @property StockItemGroup $itemGroup
 * @property BakeryCost $bakeryCost
 */
class Product extends Item
{
}
