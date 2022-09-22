<?php

namespace app\controllers;

use crudle\ext\bakery\models\Product;
use crudle\ext\bakery\models\ProductSearch;
use crudle\ext\stock\controllers\ItemController;

class ProductController extends ItemController
{
    public function modelClass(): string
    {
        return Product::class;
    }

    public function searchModelClass(): string
    {
        return ProductSearch::class;
    }
}
