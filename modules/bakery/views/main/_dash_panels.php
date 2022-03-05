<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Person;
use app\helpers\StatusMarker;

?>

<div class="ui stackable three column grid">
    <div class="four wide column">
    <div class="ui center aligned secondary top attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Overdue') ?></span>
        </div>
        <div class="ui center aligned bottom attached segment">
            <div class="ui two column grid">
                <div class="column">
                    <div class="ui small statistic">
                        <div class="value"></div>
                        <div class="value"></div>
                        <div class="text-muted"></div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui small statistic">
                        <div class="value"></div>
                        <div class="value"></div>
                        <div class="text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="six wide column">
        <div class="ui top center aligned secondary attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Recent Activity') ?></span>
        </div>
        <div class="ui attached segment">
            <div class="ui relaxed link list">
                <div class="item" style="margin-bottom: 8px">
                    <div class="content">
                        <a style="line-height: 21px; font-weight: normal" href="#">
                        </a>
                        <div class="description">
                            <!-- <span class="text-muted"</span> -->
                            <span class="right floated text-muted" title=""></span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.ui.segment -->
    </div><!-- ./column -->

    <div class="six wide column">
        <h5 class="ui top center aligned secondary attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Latest Conversation') ?></span>
        </h5>
        <div class="ui center aligned bottom attached segment">
            <div class="ui feed">
                <div class="event">
                    <div class="label text-muted">
                        <img src="">
                    </div>
                    <div class="content">
                        <div class="summary">
                            <a class="user"></a>
                            <span class="text-muted"></span>
                        </div>
                        <!--
                        <div class="extra text">
                            Our training has been going forward better than expected. Even if we don't hold extra workshops we will still finish on budget.
                        </div> -->
                        <!--
                        <div class="meta">
                        <a class="like">
                            <i class="like icon"></i> 4 Likes
                        </a>
                        </div> -->
                    </div><!-- ./content -->
                </div><!-- ./event -->
            </div><!-- ./feed -->
        </div><!-- ./segment -->
    </div>
</div><!-- ./grid -->
