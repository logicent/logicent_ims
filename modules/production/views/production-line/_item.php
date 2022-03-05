<?php

use yii\helpers\Html;
use app\models\production\ProductionStage;

?>
<tr data-key="<?= $model->id ?>">
    <td class="one wide column">
        <div id="cb-<?= $model->id ?>" class="ui checkbox">
            <input id="selection-<?= $model->id ?>" name="selection[]" value="<?= $model->id ?>" tabindex="0" class="hidden" type="checkbox">
            <label for="selection[]"></label>
        </div>
    </td>
    <td>
        <?= Html::activeHiddenInput($model, "[$model->id]id") ?>
        <?= Html::activeHiddenInput($model, "[$model->id]production_line_id") ?>
        <?= Html::activeHiddenInput($model, "[$model->id]production_stage_id") ?>

        <?= Html::activeDropDownList($model, "[$model->id]name", ProductionStage::getListOptions()) ?>
    </td>
</tr>
