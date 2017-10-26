<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $title;

    public function rules()         //Como las anotaciones
    {
        return [
            [['name', 'email'], 'required'],  //required
            ['email', 'email'],               //type email
        ];
    }
}

