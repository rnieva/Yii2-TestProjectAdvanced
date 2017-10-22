<?php

namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Dataimportone;


class ScriptOneUserImportfileController extends Controller
{
    public function actionEntry()
    {
        $model = new Dataimportone();
        $usersName = "";

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            //TODO: rename model and class, change validatios
            if ($model->validate()) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file != null) {
                    $model->upload();
                    $fileU = '/var/www/html/TestProject/web/uploads/' . $model->file->baseName . '.' . $model->file->extension;
                    $fp = fopen($fileU, 'r');
                    $fileTemplate = '/var/www/html/TestProject/resources/template.txt';
                    $varFileTemplate = file_get_contents($fileTemplate);
                    $i= 0;
                    while (!feof($fp)) {
                        $line = fgets($fp, 2048);
                        $data = str_getcsv($line, "\t");
                        $test= sizeof($data);
                        if ($data[0] != null) {
                            if (sizeof($data) == 7){
                                $search = array('USERNAME', 'FIRSTNAME', 'SURNAME', 'MAGSTRIPE', 'MOODLEID', 'UIDNUMBER', 'SHAPASSWORD');
                                $replace = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                            }else{ // if the user doesnt have MOODLEID
                                $search = array('USERNAME', 'FIRSTNAME', 'SURNAME', 'MAGSTRIPE', 'UIDNUMBER', 'SHAPASSWORD');
                                $replace = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                                //delete MOODLEID from template
                                $line = "gxymoodleid: MOODLEID";
                                $contents = str_replace($line . "\r\n"  , '', $varFileTemplate);
                                $varFileTemplate = $contents;
                            }

                            $resultTemp = str_replace($search, $replace, $varFileTemplate);
                            $model->result = $model->result . "\r" . $resultTemp;
                            $resultTemp = "";
//                          $usersName = $usersName . " - " . $data[1] . ' ' . $data[2];
                            $usersName[$i] = $data[1] . ' ' . $data[2];
                            $i++;
                        }
                    }
                    fclose($fp);
                }
                //data from text area
                if ($model->datausers != null) {
                    $fp = $model->datausers;
                    $fileTemplate = '/var/www/html/TestProject/resources/template.txt';
                    $varFileTemplate = file_get_contents($fileTemplate);
                    $i= 0;
                    foreach(preg_split("/((\r?\n)|(\r\n?))/", $fp) as $line)
                    {
                        $data = str_getcsv($line, "\t");
                        if ($data[0] != null) {
                            if (sizeof($data) == 7){
                                $search = array('USERNAME', 'FIRSTNAME', 'SURNAME', 'MAGSTRIPE', 'MOODLEID', 'UIDNUMBER', 'SHAPASSWORD');
                                $replace = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                            }else{ // if the user doesnt have MOODLEID
                                $search = array('USERNAME', 'FIRSTNAME', 'SURNAME', 'MAGSTRIPE', 'UIDNUMBER', 'SHAPASSWORD');
                                $replace = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                                //delete MOODLEID from template
                                $line = "gxymoodleid: MOODLEID";
                                $contents = str_replace($line . "\r\n"  , '', $varFileTemplate);
                                $varFileTemplate = $contents;
                            }
                            $resultTemp = str_replace($search, $replace, $varFileTemplate);
                            $model->result = $model->result . "\r" . $resultTemp;
                            $resultTemp = "";
                            $usersName[$i] = $data[1] . ' ' . $data[2];
                            $i++;
                        }
                    }
                }
            }
            return $this->render('entry-confirm-form', ['model' => $model, 'usersName' => $usersName]);
        }
        return $this->render('entry-form', ['model' => $model, 'usersName' => $usersName]);
    }
}




