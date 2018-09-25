<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $project->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $project->id_project], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $project,
        'attributes' => [
            'id_project',
            'name',
            [
                'attribute' => 'photos',
                'format' => 'raw',
                'value' => function($project){
                    $photos = $project->getPhotos()->asArray()->all();
                    foreach ($photos as $photo){
                        $name[] = Html::beginTag('div',['class' => 'photo']).
                            Html::beginTag('div',[['class' => 'photoLink']]).
                            Html::a($photo['name'],'/photo/view?id='.$photo['id_photo']).
                            Html::endTag('div').
                            Html::beginTag('div',['class' => 'photoImage']).
                            Html::img('../web/uploads/'.$photo['dir'],[
                                'alt'=>' картинка',
                                'style' => 'width:200px; height:200px;'
                            ]).
                            Html::endTag('div').
                            Html::endTag('div');
                    }
                    if($name === null){
                        return 'нет фото';
                    }
                    return implode('',$name);
                },
            ],

        ],
    ]) ?>

</div>
