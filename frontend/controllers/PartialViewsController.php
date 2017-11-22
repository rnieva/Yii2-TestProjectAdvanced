<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 10/31/17
 * Time: 5:28 PM
 */

namespace frontend\controllers;


use yii\web\Controller;
use yii\web\Session;



class PartialViewsController extends Controller
{
    public function actionEntry()
    {
//        $session = new Session;
//        $session->open();
//        $session = Yii::$app->session;
//        $language = $session->get('language');
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
        return $this->renderPartial ('view3');
    }

    public function actionView4($id)
    {
//        if (Yii::$app->request->isPjax){
//
//        }else{
//
//        }
//        return $this->renderPartial('view4',['id'=> $id]);
        return $this->renderAjax('view4',['id'=> $id]);  //  return $this->renderPartial('view4',['id'=> $id]);
    }

//http://blog.neattutorials.com/yii2-pjax-tutorial/

    public function actionFormSubmission()
    {
//         $security = new Security();
//        $string = Yii::$app->request->post('string');
        $stringHash = 'test';
//        if (!is_null($string)) {
//            $stringHash = $security->generatePasswordHash($string);
//        }
        return $this->render('view', [
            'stringHash' => $stringHash,
        ]);
    }

    public function actionTime()
    {
        return $this->render('view', ['time' => date('H:i:s')]);
    }
}