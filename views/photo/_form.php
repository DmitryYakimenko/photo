<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
/* @var $project app\models\Project */



$items= ArrayHelper::map($project,'id_project','name');
//echo '<pre>';var_dump($project);die;

$param = [
    'multiple'=>'multiple'
];
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'projects')->dropDownList($items, $param); ?>

    <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
