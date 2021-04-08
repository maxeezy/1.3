<?php


namespace app\models;


use yii\base\Model;

class ThemeAddForm extends Model
{
    public $title;
    public $text;

    public  function rules()
    {
        return [
            [['title','text'],'required']
        ];
    }

    public  function addTheme(){
        $theme = new Theme();
        $theme->text = $this->text;
        $theme->title = $this->title;
        $theme->user_id = \Yii::$app->user->identity->id;
        $theme->status = 1;
        $theme->date = time();
        $theme->save();
    }
}