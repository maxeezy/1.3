<?php


namespace app\models;


use Yii;
use yii\base\Model;

class CommentAddForm extends Model
{
    public $answer;

    public function rules()
    {
        return [
          ['answer','required'],
            ['answer','registered']
        ];
    }

    public function addComment($id){
        $answer = new Answer();
        $answer->user_id = \Yii::$app->user->identity->id;
        $answer->theme_id = $id;
        $answer->date = time();
        $answer->text = $this->answer;
        $answer->save();
    }

    public function registered($attribute,$params){
        if (Yii::$app->user->isGuest) {
            return $this->addError($attribute,'Оставлять коментарии могут только авторизованные пользователи');
        }
    }

}