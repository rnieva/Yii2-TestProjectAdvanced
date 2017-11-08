<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DatauserInput;
use app\models\Map;


class MapController extends Controller
{

    public function actionTest()
    {
        return $this->render('test-map');
    }

    public function actionEntry()
    {
        $model = new Map();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('map-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('map-entry', ['model' => $model]);
        }
    }

    public function actionMap()
    {

    }
}
