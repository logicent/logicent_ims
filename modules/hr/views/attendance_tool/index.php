<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\modules\Checkbox;

use app\models\hr\Employee;

use app\assets\FlatpickrAsset;
FlatpickrAsset::register($this);

$this->title = Yii::t('app', 'Attendance Tool');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Human Resource'), 'url' => ['modules/catalog', 'id' => 'hr']];

?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>

<div id="form-header" class="ui attached right aligned secondary segment">

<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'compact ui small primary button']) ?>

</div>

<div class="ui padded attached segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'workday')->textInput(['class' => 'pikaday']) ?>
        </div>
    </div>
</div>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
        <?php
            $employees = Employee::getListOptions();
            foreach ($employees as $id => $employee) :
                // $employee_model = new Employee();
                echo $form->field($model, "employees[{$id}]")->checkbox(['label' => $employee]);
            endforeach ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); 

$this->registerJs(<<<JS
    $('.pikaday').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
    });

    $('.pikadaytime').flatpickr({
        minuteIncrement: 15,
        enableTime: true
    });
JS
);
?>