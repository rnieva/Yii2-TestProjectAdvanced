<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Dataimportone extends Model
{
    public $file;
    public $datausers;
    public $result;

    public function attributes() {
        return ["datausers","result"];
    }

    public function upload()
    {
        if ($this->validate()) {
             $this->file->saveAs ('uploads/' . $this->file->baseName . '.' . $this->file->extension);
             return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            [['file'], 'file'],   //,'skipOnEmpty' => false
            [['file','datausers'], 'safe']
        ];
    }
}
