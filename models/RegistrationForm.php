<?php


namespace app\models;


use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{

    public  $name;
    public  $lastName;
    public  $password;
    public  $email;


    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'lastName','password','email'], 'required'],
            ['password', 'validatePassword'],
            ['email', 'validateEmail'],
            ['email','email']
        ];
    }

    public function validatePassword($attribute, $params){
        if (strlen($this->password)<6){
            $this->addError($attribute,'Пароль не должен быть короче 6 символов');
        }
    }

    public function validateEmail($attribute,$params){
        if (User::find()->where(['email'=>$this->email])->one()){
            $this->addError($attribute,"Такой мейл уже зарегистрирован");
        }
    }

    public function registration(){
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->last_name = $this->lastName;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->type_id = 3;
        $user->blocked = 0;
        $user->save();
    }
}