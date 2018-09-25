<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Photo;

class PhotoForm extends Model
{
    public $id_photo;
    public $name;
    public $dir;
    public $projects;
    public $imageFile;

    public function rules()
    {
        return [
            [['name', 'projects'], 'required'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            ['name', 'validateName']
        ];
    }

    public function validateName()
    {
        $photo = Photo::find()->where(['name' => $this->name])->one();

        if($this->name === $photo->name) {
            $this->addError('name', 'такое имя существует');
        }
        
    }




}