<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Map extends Model
{
    public $city;
    public $log;
    public $lat;
    public $power;
    public $kindbomb;

    public function rules()
    {
        return [
            [['city'], 'required'],  //required
        ];
    }

    public function attributes()
    {
        return [
            'power',
        ];
    }
}