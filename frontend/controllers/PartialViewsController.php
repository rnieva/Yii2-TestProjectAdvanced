<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 10/31/17
 * Time: 5:28 PM
 */

namespace frontend\controllers;


use yii\web\Controller;

class PartialViewsController extends Controller
{
    public function actionEntry()
    {

        if (load(Yii::$app->request->post()) ) {

            $POST_VARIABLE=Yii::$app->request->post('text');
            $text  = $POST_VARIABLE['text'];

            return $this->render('view');
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('view');
        }
    }
}