<?php

namespace app\models;

use Yii;
use yii\base\Model;

class DatauserInput extends Model
{
    public $datausers;
    public $template;
    public $result;
    public $firstname;
    public $surname;
    public $magstripe;
    public $uidnumber;
    public $userpass;
    public $shapass;
    public $username;
    public $boolmoodleid;
    public $moodleid;
    public $ldifData;


    public function rules()         //Como las anotaciones
    {
        return [
            [['firstname', 'surname'], 'required'],  //required
//            ['email', 'email'],               //type email
        ];
    }
}