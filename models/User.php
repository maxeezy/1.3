<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $last_name
 * @property string $password
 * @property int $type_id
 * @property int $blocked
 *
 * @property Answer[] $answers
 * @property Theme[] $themes
 * @property TypeUser $type
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'last_name', 'password', 'type_id', 'blocked'], 'required'],
            [['email', 'name', 'last_name', 'password'], 'string'],
            [['type_id', 'blocked'], 'integer'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeUser::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'type_id' => 'Type ID',
            'blocked' => 'Blocked',
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Themes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Theme::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeUser::className(), ['id' => 'type_id']);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }


    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }


    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findByEmail($email){
        return User::find()->where(['email'=>$email])->one();
    }
    public function validatePassword($user,$password){
        if (Yii::$app->security->validatePassword($password,$user->password)){
            return true;
        }
        else{
            return false;
        }
    }
}
