<?php

namespace frontend\controllers;


use yii\web\Controller;
use airmoi\FileMaker\FileMaker;
use airmoi\FileMaker\FileMakerException;

class TestApiFileMakerController extends Controller
{

    public function actionTestConnect()
    {
        $db = "db";
        $host = "localhost";
        $user = "user";
        $pass = "pass";


        try {

            $fm = new FileMaker($db,$host,$user,$pass,['prevalidate' => true, 'errorHandling'=> 'default']);

//            $databases = $fm->listDatabases();

            $fm = new FileMaker();
            $fm->setProperty('database', 'questionnaire');
            $fm->setProperty('hostspec', 'http://192.168.100.110');
            $fm->setProperty('username', 'web');
            $fm->setProperty('password', 'web');


            $databases = $fm->listDatabases();
        }
        catch (FileMakerException $e) {
            echo 'An error occured ' . $e->getMessage() . ' - Code : ' . $e->getCode();
        }
        return $this->render('view');
    }
}