<div class="ui stackable three column grid">
    <div class="five wide column">
        <h3 class="ui center aligned secondary top attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Sales') ?></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"><?= Yii::$app->formatter->asDecimal($stats['totalSales']) ?></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Yii::t('app', 'Today') ?></div>
            </div>
        </div>
    </div>
    <div class="five wide column">
        <h3 class="ui center aligned secondary top attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Purchases') ?></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"><?= Yii::$app->formatter->asDecimal($stats['totalPurchases']) ?></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Yii::t('app', 'Today') ?></div>
            </div>
        </div>
    </div><!-- ./column -->

    <div class="six wide column">
        <h3 class="ui top center aligned secondary attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Sales vs. Purchases') ?></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Yii::t('app', 'This Month') ?></div>
            </div>
        </div>
    </div>
    <div class="five wide column">
        <h3 class="ui center aligned secondary top attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Expenses') ?></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"><?= Yii::$app->formatter->asDecimal($stats['totalExpenses']) ?></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Yii::t('app', 'Today') ?></div>
            </div>
        </div>
    </div><!-- ./column -->
    <div class="five wide column">
        <h3 class="ui center aligned secondary top attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Profit') ?></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"><?= Yii::$app->formatter->asDecimal($stats['netProfit']) ?></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Yii::t('app', 'Today') ?></div>
            </div>
        </div>
    </div>
    <div class="six wide column">
        <h3 class="ui top center aligned secondary attached header segment">
            <span class="text-muted"><?= Yii::t('app', 'Profit') ?></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Yii::t('app', 'This Month') ?></div>
            </div>
        </div>
    </div>
</div><!-- ./grid -->
