<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Menu;
// use Zelenin\yii\SemanticUI\collections\Menu;
use Zelenin\yii\SemanticUI\Elements;
use app\models\sales\SalesOrder;

use app\assets\ChartjsAsset;

ChartjsAsset::register($this);
?>

<div class="ui vertical segment">
    <div class="ui vertical text menu">
        <div class="ui small header">
            Reports
        </div>

        <!-- <div class="ui small header">
            Stats &amp; Summary
        </div> -->
    </div>
</div>
