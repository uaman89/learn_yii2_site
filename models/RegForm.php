<?php
/**
 * Created by PhpStorm.
 * User: olexandr
 * Date: 05.10.2015
 * Time: 21:46
 */

namespace app\models;

use yii\base\Model;
use Yii;

class RegForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'filter', 'filter'=>'trim'],
            [['username', 'email', 'password'], 'required'],
            ['username', 'string', 'min'=>2, 'max' => 255],
            ['password', 'string', 'min'=>6, 'max' => 255],
            ['username', 'unique',
                'targetClass' => User::className(),
                'message' => 'this user name is already used'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'this email name is already used'],
            [ 'status', 'default',  'value'=>User::STATUS_ON_ACTIVE, 'on'=>'default'],
            [ 'status', 'in', 'range' => [
                User::STATUS_ON_ACTIVE,
                User::STATUS_ON_NOT_ACTIVE,
                User::STATUS_ON_DELETED
            ]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Ім\'я коритсувача',
            'email' => 'Ел. пошта',
            'password' => 'пароль'
        ];
    }

    public  function reg(){
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        //var_dump($user);exit;
        return $user->save() ? $user : null;
    }
}
