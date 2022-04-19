<?php

namespace app\controllers;

use logicent\bakery\models\Product;
use logicent\bakery\models\ProductSearch;
use logicent\stock\controllers\ItemController;

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
