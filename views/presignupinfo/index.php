<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresignupinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presignupinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presignupinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<p>
		<input type="text" style="height:34px;border-radius: 4px;margin: 0px 5px 0px 0px;border: 1px solid #ccc;" placeholder="批量输入账号与密码"/><?= Html::a('一键分配', ['create'], ['class' => 'btn btn-success']) ?>
		<input type="text" style="height:34px;border-radius: 4px;margin: 0px 5px 0px 0px;border: 1px solid #ccc;" placeholder="批量输入账号"/><?= Html::a('一键退赛', ['create'], ['class' => 'btn btn-danger']) ?>
        <input type="text" style="height:34px;border-radius: 4px;margin: 0px 5px 0px 0px;border: 1px solid #ccc;" placeholder="批量输入账号"/><?= Html::a('一键检索', ['create'], ['class' => 'btn btn-primary']) ?>
		<!--<input type="text" placeholder="批量输入密码"/>-->
	</p>
	<p>
		
		<!--<input type="text" placeholder="批量输入密码"/>-->
	</p>
	
    <p>
        
		<?= Html::a('分配', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('退赛', ['create'], ['class' => 'btn btn-danger']) ?>
		<?= Html::a('收款账号有误', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            'sid',
            'uid',
            'email:email',
            'username',
            'mobilephone',
            // 'sex',
            // 'address',
             'realname',
            // 'count_bank',
            // 'count_number',
            // 'result',
             'validate',
             'game_account',
            // 'game_password',
            // 'remark',
            // 'action_datetime',
             'begin_datetime:datetime',
             /*[
                'label'=>'更多操作',
                'format'=>'raw',
                'value' => function($data){
                    $url = "http://www.baidu.com";
                    return Html::a('添加权限组', $url, ['title' => '审核']); 
                }
            ],*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
