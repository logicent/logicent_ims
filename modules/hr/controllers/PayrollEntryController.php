<?php

namespace app\controllers\hr;

use Yii;
use app\models\hr\PayrollEntry;
use app\models\hr\PayrollEntrySearch;
use app\controllers\BreadController;


class PayrollEntryController extends BreadController
{
    public function init()
    {
        $this->modelNamespace = 'app\models\hr';

        parent::init();
    }

    public function actionCreate()
    {
        $model = new PayrollEntry();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['read', 'id' => $model->id]);
        }

        $model->loadDefaultValues();

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['read', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // check relation dependencies first and either block or allow
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = PayrollEntry::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested record does not exist.'));
    }
}
