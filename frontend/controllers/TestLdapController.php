<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DatauserInput;



class TestLdapController extends Controller
{

    public function actionEntry()
    {
        $model = new DatauserInput();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model
            // read the data users
            $POST_VARIABLE=Yii::$app->request->post('Datauserinput');
            $firstname  = $POST_VARIABLE['firstname'];
            $surname = $POST_VARIABLE['surname'];
            $model->firstname = $firstname;             // if I not validate I have to do this to pass values in the model to the view
            $model->surname = $surname;             // if I not validate I have to do this to pass values in the model to the view
            $uidnumber = $POST_VARIABLE['uidnumber'];

            TestLdapController::connectLdap();


            return $this->render('entry-confirm-form1', ['model' => $model, 'resultTemp' => $resultTemp]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry-form1', ['model' => $model]);
        }
    }


    function connectLdap()
    {
        $ldaphost = "ldaps://ldap.example.com/";

        // Connecting to LDAP
        $ldapconn = ldap_connect($ldaphost)
        or die("Could not connect to {$ldaphost}");
    }
}