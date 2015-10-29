<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $create_at
 * @property integer $update_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    const STATUS_ON_ACTIVE = 10;
    const STATUS_ON_NOT_ACTIVE = 1;
    const STATUS_ON_DELETED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['username', 'email', 'password_hash'], 'filter', 'filter'=>'trim'],
            [['username', 'email', 'status'], 'required'],
            ['email','email'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            ['username', 'string', 'min'=> 2, 'max' => 255],
            ['password_hash', 'required', 'on' => 'create' ],
            ['username', 'unique', 'message' => 'this name is already used'],
            ['email', 'unique', 'message' => 'this email is already used']
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'created_at' => 'Create At',
            'updated_at' => 'Update At',
        ];
    }

    public function behaviors(){
        return [
            TimestampBehavior::className()
        ];
    }

    public function findUserByName($username){
        return static::findOne([
            'username' => $username
        ]);
    }


    /*auth methods*/
    public static function findIdentity($id)
    {
        return static::findOne(
            ['id'=>$id, 'status'=>self::STATUS_ON_ACTIVE]
        );
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    //helpers
    public function setPassword($password){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
