<?php


namespace app\models;


use yii\base\Model;

class ChangeStatus extends  Model
{

    public  $status;

    public function rules()
    {
        return [
            ['status','required'],
        ];
    }

    public function change($idTheme,$status){
        $theme = Theme::findOne($idTheme);
        $theme->status = $status;
        $theme->save();
    }

}