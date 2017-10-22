<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\DataUser;
use app\models\DataUserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Country;

class ManageDbController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new DataUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

//    public function actionIndex()
//    {
//
//        $query = DataUser::find();
//
////	$example = DataUser::findOne('US'); //change condition
//
//        $pagination = new Pagination([
//            'defaultPageSize' => 5,
//            'totalCount' => $query->count(),
//        ]);
//
//        $datausers = $query->orderBy('username')
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();
//
//        return $this->render('index', [
//            'datausers' => $datausers,
//            'pagination' => $pagination,
//        ]);
//    }

    public function actionCreate($username,$firstname,$surname,$ldifData)   //Create a record in DB
    {
        //save in db, we get data from model
        //Active Record is like Entity Framework, use object to manage the DB

        $model = new DataUser();
        $model->username=$username;
        $model->firstname=$firstname;
        $model->surname=$surname;
        $model->ldifData=$ldifData;
        $model->usercreated= date('Y-m-d H:i:s');
        $model->save(false); //I use "false" to increment the "userid"


        $saveOK=true;
        if ($saveOK==true){

            return $this->render('entry-confirm-save'); //at the moment view in Scriptoneusergenrator
        } else {

            return $this->render('entry-confirm-save');
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)     //curioso que al acceder aqui le llega el $userid auqnue no tenga el campo $id
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = DataUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
