<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Presignupinfo */

$this->title = $model->sid;
$this->params['breadcrumbs'][] = ['label' => 'Presignupinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presignupinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sid], [
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
            'sid',
            'uid',
            'email:email',
            'username',
            'mobilephone',
            'sex',
            'address',
            'realname',
            'count_bank',
            'count_number',
            'result',
            'validate',
            'game_account',
            'game_password',
            'remark',
            'action_datetime',
            'begin_datetime',
        ],
    ]) ?>

</div>
