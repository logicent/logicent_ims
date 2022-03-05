<?php

namespace app\controllers\production;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\production\ProductionLine;
use app\models\production\ProductionLineSearch;
use app\models\production\ProductionLineStage;
use app\controllers\BreadController;

class ProductionLineController extends BreadController
{
    public function init()
    {
        $this->modelNamespace = 'app\models\production';

        parent::init();
    }

    public function actionRead($id)
    {
        $model = $this->findModel($id);
        
        $model->isReadOnly = true;

        $query = ProductionLineStage::find()->where(['production_line_id' => $model->id]);
        
        $lineStageDataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
            // 'sort' => [
            //     'defaultOrder' => [
            //         'id' => SORT_ASC, 
            //     ]
            // ],
        ]);
        
        $this->setFormSidebarData($model);
        
        return $this->render('read', [
            'model' => $model,
            'lineStageDataProvider' => $lineStageDataProvider,            
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductionLine();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $lineStages = Yii::$app->request->post('ProductionLineStage');

            foreach ($lineStages as $lineStage)
            {
                $stage_model = new ProductionLineStage();
                $stage_model->attributes = $lineStage;
                $stage_model->save();
            }

            return $this->redirect(['read', 'id' => $model->id]);
        }

        $query = ProductionLineStage::find()->where(['production_line_id' => $model->id]);
        
        $lineStageDataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
            // 'sort' => [
            //     'defaultOrder' => [
            //         'id' => SORT_ASC, 
            //     ]
            // ],
        ]);

        $model->loadDefaultValues();
        
        return $this->render('create', [
            'model' => $model,
            'lineStageDataProvider' => $lineStageDataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $lineStages = Yii::$app->request->post('ProductionLineStage');

            foreach ($lineStages as $lineStage)
            {
                if (empty($lineStage['id']))
                    $stage_model = new ProductionLineStage();
                else
                    $stage_model = ProductionLineStage::findOne($lineStage['id']);
                $stage_model->attributes = $lineStage;
                $stage_model->save();
            }
            
            return $this->redirect(['read', 'id' => $model->id]);
        }

        $query = ProductionLineStage::find()->where(['production_line_id' => $model->id]);
        
        $lineStageDataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
            // 'sort' => [
            //     'defaultOrder' => [
            //         'id' => SORT_ASC, 
            //     ]
            // ],
        ]);

        return $this->render('update', [
            'model' => $model,
            'lineStageDataProvider' => $lineStageDataProvider,            
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
        if (($model = ProductionLine::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested record does not exist.'));
    }

    public function actionAddRow()
    {
        $model = new ProductionLineStage();
        $model->production_line_id = Yii::$app->request->get('prod_line_id');

        return $this->renderAjax('_item', [
            'model' => $model,
        ]);
    }

    public function actionDeleteRow($id)
    {
        $model = ProductionLineStage::findOne($id);
        
        return $model->delete(); // number of deleted rows either 0 or more or false (unsuccessful)
    }
}
