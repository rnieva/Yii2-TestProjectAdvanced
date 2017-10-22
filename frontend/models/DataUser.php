<?php

namespace app\models;

use Yii;


class DataUser extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'DataUser';
    }


    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['firstname'],'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'userid' => 'userid',
            'username' => 'username',
            'firstname' => 'firstname',
            'surname' => 'surname',
            'ldifData' => 'ldifData',
            'usercreated' => 'usercreated',
        ];
    }

    public function attributes()
    {
        return [
            'userid',
            'username',
            'firstname',
            'surname',
            'ldifData',
            'usercreated',
        ];
    }

}