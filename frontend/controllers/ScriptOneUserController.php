<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DatauserInput;


class ScriptOneUserController extends Controller
{

    public function actionEntry()
    {
        $model = new DatauserInput();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model
            // read the data users
            $POST_VARIABLE=Yii::$app->request->post('DatauserInput');
            $firstname  = $POST_VARIABLE['firstname'];
            $surname = $POST_VARIABLE['surname'];
            $model->firstname = $firstname;             // if I not validate I have to do this to pass values in the model to the view
            $model->surname = $surname;             // if I not validate I have to do this to pass values in the model to the view
            $uidnumber = $POST_VARIABLE['uidnumber'];
            $username = $POST_VARIABLE['username'];
            $shapass = $POST_VARIABLE['shapass'];
            $moodleid = $POST_VARIABLE['moodleid'];
            $magstripe = $POST_VARIABLE['magstripe'];
            $file = '/var/www/html/TestProjectAdvanced/resources/template.txt';
            $varfile= file_get_contents($file);
            $search  = array('USERNAME', 'FIRSTNAME', 'SURNAME', 'MAGSTRIPE', 'MOODLEID', 'UIDNUMBER','SHAPASSWORD');
            $replace = array($username, $firstname, $surname, $magstripe, $moodleid, $uidnumber, $shapass);
            $resultTemp=str_replace($search, $replace, $varfile);
            ScriptOneUserController::generateFile($username, $firstname, $surname, $magstripe, $moodleid, $uidnumber, $shapass);

            return $this->render('entry-confirm-form1', ['model' => $model, 'resultTemp' => $resultTemp]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry-form1', ['model' => $model]);
        }
    }

    public function generateFile($username, $firstname, $surname, $magstripe, $moodleid, $uidnumber, $shapass)
    {
        $file = '/var/www/html/TestProjectAdvanced/frontend/web/profiles/'.$firstname.'.txt';

        $content = $firstname."\n".$surname;

        file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
    }

}