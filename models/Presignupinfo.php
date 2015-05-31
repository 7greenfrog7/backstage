<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pre_signup_info".
 *
 * @property string $sid
 * @property string $uid
 * @property string $email
 * @property string $username
 * @property string $mobilephone
 * @property string $sex
 * @property string $address
 * @property string $realname
 * @property string $count_bank
 * @property string $count_number
 * @property string $result
 * @property string $validate
 * @property string $game_account
 * @property string $game_password
 * @property string $remark
 * @property string $action_datetime
 * @property string $begin_datetime
 */
class Presignupinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pre_signup_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'email', 'username', 'mobilephone', 'sex', 'address', 'realname', 'validate', 'action_datetime', 'begin_datetime'], 'required'],
            [['uid'], 'integer'],
            [['action_datetime', 'begin_datetime'], 'safe'],
            [['email'], 'string', 'max' => 40],
            [['username'], 'string', 'max' => 15],
            [['mobilephone'], 'string', 'max' => 11],
            [['sex'], 'string', 'max' => 2],
            [['address', 'count_bank', 'remark'], 'string', 'max' => 50],
            [['realname'], 'string', 'max' => 10],
            [['count_number'], 'string', 'max' => 30],
            [['result'], 'string', 'max' => 5],
            [['validate'], 'string', 'max' => 1],
            [['game_account', 'game_password'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Sid',
            'uid' => 'Uid',
            'email' => 'Email',
            'username' => 'Username',
            'mobilephone' => 'Mobilephone',
            'sex' => 'Sex',
            'address' => 'Address',
            'realname' => 'Realname',
            'count_bank' => 'Count Bank',
            'count_number' => 'Count Number',
            'result' => 'Result',
            'validate' => 'Validate',
            'game_account' => 'Game Account',
            'game_password' => 'Game Password',
            'remark' => 'Remark',
            'action_datetime' => 'Action Datetime',
            'begin_datetime' => 'Begin Datetime',
        ];
    }
    
    /**
     * 一键分配账号给申请参赛的用户
     */
    public function onekeyAccount($account_user_type,$acount_pwd) {
      
      //根据空格将字符串分割为数组
      $account_pwd_array = explode(' ',$acount_pwd);
      
      //计算共输入几个账号供后台分配，后续将与待分配人数做比较
      if(!$count_of_account = sizeof($account_pwd_array))
      {
        return [
          'error' => 1,
          'msg' => '请输入至少一对账号和密码',
          ];
      }
      
      foreach ($account_pwd_array as $key => $value)
      {
        $temp_account_pwd_array = explode(',',$value);
        //检查账号格式是否正确
        if(!preg_match("/[0-9]{6}/",trim($temp_account_pwd_array[0])))
        {
          return [
          'error' => 1,
          'msg' => '账号'.$temp_account_pwd_array[0].'格式不正确！',
          ];
        }
        //检查是否只有账号而没有密码
        if(sizeof($temp_account_pwd_array)==1)
        {
          return [
          'error' => 1,
          'msg' => '账号'.$temp_account_pwd_array[0].'缺少密码，请补全！',
          ];
        }
        $account_pwd_array[$key] = $temp_account_pwd_array;//array([account,pwd],[account,pwd],....)      
      }
      
      //sql查询：查询出有多少处于validate=$account_user_type的条目
      $sql_count_validate = "select count(1) as count from pre_signup_info where validate =".$account_user_type;
      $connection = Yii::$app->db;
      $connection->open();
      $command = $connection->createCommand($sql_count_validate);
      $result = $command->queryOne();//queryAll();
      $connection->close();
      
      //后台待分配人数
      if(!$count_of_waiter = $result['count'])
      {
        return [
          'error' => 1,
          'msg' => '目前没有等待分配账号的'.($account_user_type==0)?'申请参赛的':'申请重置密码的'.'用户',
          ];
      }
      
      //需要更新的条目数
      $update_num = 0;
      
      if($count_of_account >= $count_of_waiter)
      {
        $update_num = $count_of_account; //更新条目数=所有待分配用户数目
      }
      else
      {
        $update_num = $count_of_account;  //更新条目数=账号数目
      }
      
      //存储sql查询语句的数组
      $sql_array = array();
      //存储sql日志
      $sql_log = array();
      for($i=0;$i<$update_num;$i++)
      {
        if($account_user_type == 0) ////申请分配账号密码的用户类型为报名参赛者，需要更新begin_datetime
        {
          $sql_array[$i] = 
                "update pre_signup_info set game_account=".$account_pwd_array[$i][0].
                ",game_password=".$account_pwd_array[$i][1].
                ",validate=1 ".
                ",begin_datetime=".date('Y-m-d H:i:s').
                ",action_datetime=".date('Y-m-d H:i:s').
                " where validate =".$account_user_type." LIMIT 1";
                
        }
        else if($account_user_type == 6)//申请分配账号密码的用户类型为申请重置密码者，此时需要直接更新账号所对应的密码即可
        {
           $sql_array[$i] = 
                "update pre_signup_info set".
                " game_password=".$account_pwd_array[$i][1].
                ",validate=1 ".
                ",action_datetime=".date('Y-m-d H:i:s').
                " where validate =".$account_user_type." and game_account = ".$account_pwd_array[$i][0].
                " LIMIT 1";
        }
        //$sql_log[$i] ="INSERT INTO `ultrax`.`pre_loginfo` (`sid`, `uid`, `email`, `username`, `mobile`, `realname`, `count_number`, `game_account`, `game_password`, `now_validate`, `operator_time`, `operator`, `remark`) VALUES ('".$message_array[0]."', '".$message_array[8]."', '".$message_array[4]."', '".$message_array[3]."', '".$message_array[5]."', '".$message_array[9]."', '".$message_array[10]."', '".trim($message_array[1])."', '".trim($message_array[2])."', '1', '".date('Y-m-d H:i:s')."', '".$message_array[11]."', '".trim($message_array[6])."');";	 
      }
      
      //执行sql事务语句
      $connection->open();
      $transaction = $connection->beginTransaction();
      try {
        //$connection->createCommand($sql1)->execute();
        //$connection->createCommand($sql2)->execute();
        for($j=0;$j<$update_num;$j++)
        {
          $connection->createCommand($sql_array[$j])->execute();
        }
        $transaction->commit();
      } catch(Exception $e) {
      $transaction->rollBack();
      $connection->close();
      return [
          'error' => 1,
          'msg' => '分配失败：数据库执行错误，已全部回滚！',
          ];
      }
      return [
          'error' => 0,
          'msg' => '分配成功！',
          ];
      
      
      
    }
    
}
