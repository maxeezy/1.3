<?php


namespace app\models;


use yii\base\Model;

class BanForm extends Model
{

    public  $status;

    public function rules()
    {
        return [
            ['status','required'],
        ];
    }

    public function change($idUser,$status){
        $user = User::findOne($idUser);
        $user->blocked = $status;
        $user->save();
    }
}