<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 12/6/17
 * Time: 7:46 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;

class FileForm extends Model
{
    public $name;
    public $email;
    public $title;
    public $file;
    public $urlFile;

    public function rules()         //Como las anotaciones
    {
        return [
            [['name'], 'required'],  //required
            ['email', 'email'],               //type email
            [['file'], 'file'],   //,'skipOnEmpty' => false
            [['file'], 'safe']
        ];
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
}