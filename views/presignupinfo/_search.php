<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresignupinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presignupinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sid') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'mobilephone') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'realname') ?>

    <?php // echo $form->field($model, 'count_bank') ?>

    <?php // echo $form->field($model, 'count_number') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'validate') ?>

    <?php // echo $form->field($model, 'game_account') ?>

    <?php // echo $form->field($model, 'game_password') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'action_datetime') ?>

    <?php // echo $form->field($model, 'begin_datetime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
