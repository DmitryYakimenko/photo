<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Photo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_photo',
            'name',
            'dir',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    //var_dump('uploads/'.$data->dir);die;
                    return Html::img('../web/uploads/'.$data->dir,[
                        'alt'=>'картинка',
                        'style' => 'width:200px;'
                    ]);
                },
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {delete}'
            ],
        ],
    ]); ?>
</div>
