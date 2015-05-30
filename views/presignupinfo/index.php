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
		<input id="account_pwd" type="text" style="height:34px;border-radius: 4px;margin: 0px 5px 0px 0px;border: 1px solid #ccc;" placeholder="批量输入账号与密码"/>
        <?= Html::button('一键分配', ['id'=>'onekey-account','title' => '一键分配账号给申请者','class' => 'btn btn-success']) ?>
		<input type="text" style="height:34px;border-radius: 4px;margin: 0px 5px 0px 0px;border: 1px solid #ccc;" placeholder="批量输入账号"/>
        <?= Html::button('一键退赛', ['id'=>'onekey-quite','title' => '一键退赛并发送短信和邮件通知','class' => 'btn btn-danger']) ?>
        <input type="text" style="height:34px;border-radius: 4px;margin: 0px 5px 0px 0px;border: 1px solid #ccc;" placeholder="批量输入账号"/>
        <?= Html::button('一键检索', ['id'=>'onekey-find','title' => '批量输入账号检索','class' => 'btn btn-primary']) ?>
		<!--<input type="text" placeholder="批量输入密码"/>-->
	</p>
	<p>
		
		<!--<input type="text" placeholder="批量输入密码"/>-->
	</p>
	
    <p>
        
		
		<?= Html::a('退赛', ['create'], ['title' => '退赛并回收账号','class' => 'btn btn-danger']) ?>
		<?= Html::a('银行', ['create'], ['title' => '银行账号填写有误','class' => 'btn btn-primary']) ?>
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
             'realname',
             'validate',
             'game_account',
             'begin_datetime:datetime',
            // 'sex',
            // 'address',
            // 'count_bank',
            // 'count_number',
            // 'result',
            // 'game_password',
            // 'remark',
            // 'action_datetime',
            //['attribute'=>'这是测试code','value'=>function(){return 'abc';}],
             [
                'label'=>'操作',
                'format'=>'raw',
                'value' => function($data){
                    $url = "http://www.baidu.com";
                    return Html::a('退赛', $url, ['title' => '单个用户退赛操作','class' => 'btn btn-danger'],['title' => '退赛']).Html::a('银行', $url, ['title' => '单个用户银行账号填写有误','class' => 'btn btn-primary'],['title' => '银行']); 
                    
                }
            ],
            ['class' => 'yii\grid\ActionColumn','template'=>'{update}','header'=>'更多'],
        ],
    ]); ?>

</div>
