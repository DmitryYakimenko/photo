<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_photo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_photo',
            'name',
            'dir',
            [
                'attribute' => 'projects',
                'format' => 'raw',
                'value' => function($photo){
                    $projects = $photo->getProjects()->asArray()->all();
                    foreach ($projects as $project){
                        $name[] = Html::a($project['name'],'/project/view?id='.$project['id_project']);
                    }
                    if($name === null){
                        return 'нет проектов';
                    }
                    return implode(', ',$name);
                },
            ],
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => function($photo){
                    return Html::img('../web/uploads/'.$photo->dir);
                },
            ],
        ],
    ]) ?>

</div>
