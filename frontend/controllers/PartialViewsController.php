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
        $ok = true;
        if ( $ok == true ) {

//            $POST_VARIABLE=Yii::$app->request->post('text');
//            $text  = $POST_VARIABLE['text'];

            return $this->render('view');
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('view');
        }
    }
    public function actionView1()
    {
        return $this->renderPartial('view1');
    }

    public function actionView2()
    {
        return $this->renderPartial('view2');
    }

    public function actionView3()
    {
        return $this->renderPartial('view3');
    }

    public function actionView4()
    {
        return $this->renderPartial('view4');
    }

}