<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DatauserInput;
use app\models\EntryForm;


class CreateUserAccountController extends Controller
{
    public function actionEntry() //CreateUser
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model
            // stages: FileMaker, POS, PASS, LDAP, AD

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function CreateFileMaker(){

    }

    public function CreatePOS(){

    }

    public function CreatePASS(){

    }

    public function CreateLDAP(){

    }

    public function CreateAD(){

    }

}
