<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Presignupinfo */

$this->title = 'Create Presignupinfo';
$this->params['breadcrumbs'][] = ['label' => 'Presignupinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presignupinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
