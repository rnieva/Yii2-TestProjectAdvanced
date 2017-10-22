<?php

namespace frontend\controllers;

use app\models\DataUser;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DatauserInput;


class ScriptOneUserGeneratorController extends Controller
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
//            $firstname  = $model->firstname;  //other way
//            $surname = $model->surname;
            $username = substr($firstname, 0, 1) . '.' . $surname;
            $model->firstname = $firstname;
            $model->surname = $surname;
            $model->username = $username;
            $magstripe = ScriptOneUserGeneratorController::generateMagstripe($surname);
            $uidnumber = $POST_VARIABLE['uidnumber'];
            $userpass = ScriptOneUserGeneratorController::generatePass();
            $shapass = shell_exec('slappasswd -h "{SHA}" -s '.$userpass);
            $moodleid = $POST_VARIABLE['moodleid'];

            //if the user doesn't have moodleid, delete this line from $varfile
            $boolmoodleid = $POST_VARIABLE['boolmoodleid'];
            $file = '/var/www/html/TestProjectAdvanced/resources/template.txt';
            $varfile= file_get_contents($file);

            if ($boolmoodleid == 0)
            {
                $line = "gxymoodleid: MOODLEID";
                $contents = str_replace($line . "\r\n"  , '', $varfile);
//                file_put_contents($file, $contents);
                $varfile = $contents;

            }else{

            }

            $search  = array('USERNAME', 'FIRSTNAME', 'SURNAME', 'MAGSTRIPE', 'MOODLEID', 'UIDNUMBER','SHAPASSWORD');
            $replace = array($username, $firstname, $surname, $magstripe, $moodleid, $uidnumber, $shapass);
            $resultTemp=str_replace($search, $replace, $varfile);
            $model ->ldifData = $resultTemp;
            return $this->render('entry-confirm-form1', ['model' => $model, 'resultTemp' => $resultTemp , 'resultTemp2' => $boolmoodleid]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry-form1', ['model' => $model]);
        }
    }

    public function generateMagstripe($surname)
    {
        //Generate a Magstripe
        $j = 0;
        $magstripe = '';
        $magstripe= 'GWCS'. strtoupper ( substr($surname, 0, 3) );
        $nucharacters = '0123456789';
        for ($j = 0; $j < 5; $j++) {
            $magstripe = $magstripe . $nucharacters[rand(0, strlen($nucharacters)-1)];
        }
        return $magstripe;
    }

    public function generatePass()
    {
        //Generate a password (Length 8) with First Capital Letter, 5 more letters , two numbers.
        $password='';
        $i = 0;
        $j = 0;
        $upcharacters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $locharacters = 'abcdefghijklmnopqrstuvwxyz';
        $nucharacters = '0123456789';
        $password= $upcharacters[rand(0, strlen($upcharacters)-1)];
        for ($i = 0; $i < 5; $i++) {
            $password = $password . $locharacters[rand(0, strlen($locharacters)-1)];
        }
        for ($j = 0; $j < 2; $j++) {
            $password = $password . $nucharacters[rand(0, strlen($nucharacters)-1)];
        }
        return $password;
    }

//    //TODO: move this action to a future class it'll managedatausers controller
//    public function actionCreate($username,$firstname,$surname,$ldifData)   //Create a record in DB
//    {
//        //save in db, we get data from model
//        //Active Record is like Entity Framework, use object to manage the DB
//
//        $model = new DataUser();
//        $model->username=$username;
//        $model->firstname=$firstname;
//        $model->surname=$surname;
//        $model->ldifData=$ldifData;
//        $model->usercreated= date('Y-m-d H:i:s');
//        $model->save(false); //I use "false" to increment the "userid"
//
//
//        $saveOK=true;
//        if ($saveOK==true){
//
//            return $this->render('entry-confirm-save');
//        } else {
//
//           return $this->render('entry-confirm-save');
//        }
//    }

}