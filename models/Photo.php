<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property int $id_photo
 * @property string $name
 * @property string $dir
 *
 * @property ProjectPhoto[] $projectPhotos
 */
class Photo extends \yii\db\ActiveRecord
{

    public $projects;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'dir'], 'required'],
            [['name', 'dir'], 'string', 'max' => 255],
            [['name'], 'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_photo' => 'Id Photo',
            'name' => 'Name',
            'dir' => 'Dir',
        ];
    }


    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        if($insert) {
            if ($this->projects == null) {
                $this->projects = \Yii::createObject(Project::className());
            }
            foreach ($this->projects as $project){
                $project->link('photos', $this);
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['id_project' => 'id_project'])
            ->viaTable('Project_Photo', ['id_photo' => 'id_photo']);
    }

    public function setProjects(Project $projects)
    {
        $this->projects = $projects;
    }


}
