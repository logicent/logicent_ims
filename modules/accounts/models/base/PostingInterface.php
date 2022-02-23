<?php

namespace logicent\accounts\models\base;

interface PostingInterface
{
    // depends on type of transaction document
    public function hasInventoryImpact();

    // defaults to true but checks data entry/edits
    public function updateInventory();

    // depends on type of transaction document
    public function hasAccountingImpact();

    // defaults to true but checks data entry/edits
    public function updateAccounting();
}