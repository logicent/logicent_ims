<?php

namespace app\controllers\setup;

use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use app\models\auth\RolePermission;
use yii\web\Controller;

class RolePermissionController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RolePermission::find(),
            'sort' => [
                'defaultOrder' => [
                    'updated_at' => SORT_DESC,
                    // 'name' => SORT_ASC, 
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
