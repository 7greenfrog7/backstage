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
}
