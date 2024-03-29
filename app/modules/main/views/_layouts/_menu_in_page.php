<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

ArrayHelper::multisort($menuList, 'label');
ArrayHelper::multisort($menuList, 'group');
$menuGroups = ArrayHelper::map($menuList, 'label', 'label', 'group');
$menuGroupClass = $this->params['menuGroupClass'];
?>

<div class="ui four column grid">
<?php
    foreach ($menuGroups as $groupName => $groupItems) : ?>
    <div class="column">
        <div class="ui card">
            <div class="content">
                <?= Html::tag('div',
                        Elements::icon($menuGroupClass::enumIcons()[$groupName], ['class' => 'grey right floated']) .
                        '&ensp;'.
                        $menuGroupClass::enums()[$groupName], [
                        'class' => 'header',
                        'style' => 'font-family: inherit; margin-bottom: 1em; color: #36414c; font-weight: normal;'
                    ]) ?>
                <div class="description">
                <?php
                    foreach ( $menuList as $menu ) :
                        if ( (empty($menu['group']) || $menu['group'] == $groupName)
                            && $menu['visible'] === true) :
                            echo Html::tag('div',
                                    Html::a(Elements::icon('angle right') . Yii::t('app', '{menuLabel}', ['menuLabel' => $menu['label']]),
                                            Url::to([$menu['route']]),
                                            ['class' => 'item', 'style' => 'color: #6c7680;']
                                    ),
                                    ['class' => 'ui link selection list']
                                );
                        endif;
                    endforeach; ?>
                </div><!-- ./description -->
            </div><!-- ./content -->
        </div><!-- ./ui card -->
    </div><!-- ./column -->
<?php
    endforeach; ?>
</div><!-- ./ui column grid -->

