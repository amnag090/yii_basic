<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Nuser".
 *
 * @property int $user_id
 * @property string $name
 * @property string $phno
 * @property string $email
 * @property string $password
 * @property string $authKey
 *
 * @property Album[] $albums
 * @property AlbumCategories[] $albumCategories
 */
class Nuser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Nuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phno', 'email', 'password', 'authKey'], 'required'],
            [['password'], 'string'],
            [['authKey'], 'safe'],
            [['name', 'phno', 'email'], 'string', 'max' => 250],
            [['phno'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
            'phno' => 'Phno',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumCategories()
    {
        return $this->hasMany(AlbumCategories::className(), ['user_id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
     public static function findIdentity($id)
     {
        return static::findOne($id);
         }
 
     /**
      * @inheritdoc
      */
     public static function findIdentityByAccessToken($token, $type = null)
     {
        return "not supported";
     }
 
     /**
      * Finds user by username
      *
      * @param string $username
      * @return static|null
      */
     public static function findByUsername($username)
     {
         return self::findOne(['email'=>$username]);
     }
 
     /**
      * @inheritdoc
      */
     public function getId()
     {
         return $this->user_id;
     }
 
     /**
      * @inheritdoc
      */
     public function getAuthKey()
     {
         return $this->authKey;
     }
 
     /**
      * @inheritdoc
      */
     public function validateAuthKey($authKey)
     {
         return $this->authKey === $authKey;
     }
 
     /**
      * Validates password
      *
      * @param string $password password to validate
      * @return bool if password provided is valid for current user
      */
     public function validatePassword($password)
     {
         return $this->password === $password;
     }
}
