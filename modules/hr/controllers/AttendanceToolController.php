<?php

namespace app\controllers\hr;

use Yii;
use app\models\hr\AttendanceTool;

class AttendanceToolController extends \app\controllers\LayoutController
{
    public function actionIndex()
    {
        $model = new AttendanceTool();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
