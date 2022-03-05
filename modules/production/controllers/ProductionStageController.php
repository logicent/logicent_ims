<?php

namespace app\controllers\production;

use Yii;
use app\models\production\ProductionStage;
use app\models\production\ProductionStageSearch;
use app\controllers\BreadController;


class ProductionStageController extends BreadController
{
    public function init()
    {
        $this->modelNamespace = 'app\models\production';

        parent::init();
    }
    
    public function actionCreate()
    {
        $model = new ProductionStage();

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
        if (($model = ProductionStage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested record does not exist.'));
    }
}
