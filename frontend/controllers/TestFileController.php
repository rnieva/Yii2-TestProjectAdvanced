<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 12/6/17
 * Time: 7:44 PM
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\FileForm;
use yii\web\UploadedFile;


class TestFileController extends Controller
{
    public function actionEntry()
    {
        $model = new FileForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $POST_VARIABLE=Yii::$app->request->post('FileForm');
            $title  = $POST_VARIABLE['name'];
            $model->title = $title[0];

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file != null)
            {
                $model->upload();
                $model->urlFile = 'uploads/'.$model->file;
            }

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionEntry2()
    {
        $model = new FileForm();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file != null)
            {
                $model->upload();
            }

            return $this->render('entry-confirm2', ['model' => $model]);
        }
    }

    public function actionEntry3($name, $email, $urlFile)
    {
        $model = new FileForm();
        $model->urlFile = $urlFile;
        return $this->render('entry-confirm2', ['model' => $model]);
    }
}