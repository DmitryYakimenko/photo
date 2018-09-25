<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id_project
 * @property string $name
 *
 * @property ProjectPhoto[] $projectPhotos
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            ['name', 'validateName']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project' => 'Id Project',
            'name' => 'Name',
        ];
    }

    public function validateName()
    {
        $project = Project::find()->where(['name' => $this->name])->one();

        if($this->name === $project->name) {
            $this->addError('name', 'такое имя существует');
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['id_photo' => 'id_photo'])
            ->viaTable('Project_Photo', ['id_project' => 'id_project']);
    }
}
