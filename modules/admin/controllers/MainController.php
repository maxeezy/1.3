<?php


namespace app\modules\admin\controllers;


use app\models\BanForm;
use app\models\ChangeStatus;
use app\models\Status;
use app\models\Theme;
use Yii;
use yii\debug\models\search\User;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class MainController extends Controller
{


    public function beforeAction($action)
    {
        if (\Yii::$app->user->identity->type_id!=4){
            return $this->goBack();
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actionIndex(){
        return $this->render('index');
    }

    public  function actionThemes(){
        $themes =  Theme::find()->orderBy('status')->all();
        return $this->render('themes',['themes'=>$themes]);
    }

    public function actionView($id){
        $theme = Theme::findOne($id);
        $comments = $theme->answers;
        $form = new ChangeStatus();
        $status = ArrayHelper::map(Status::find()->all(),'id','name');
        if ($form->load(Yii::$app->request->post())){
            if ($form->validate()){
                $form->change($id,$form->status);
                $session = Yii::$app->session;
                $session->setFlash('ok','Вы успешно изменили тему!');
                return $this->refresh();
            }
        }
        return $this->render('view',['theme'=>$theme,'comments'=>$comments,'model'=>$form,'status'=>$status]);
    }

    public function actionUsers(){
        $users = \app\models\User::find()->all();
        $blocked = ['Не заблокирован','Заблокирован'];
        return $this->render('users',['users'=>$users,'blocked'=>$blocked]);
    }

    public function actionBan($id){
        $user = \app\models\User::findOne($id);
        $blocked = ['Не заблокирован','Заблокирован'];
        $form = new BanForm();
        if ($form->load(Yii::$app->request->post())){
            if ($form->validate()){
                $form->change($id,$form->status);
                $session = Yii::$app->session;
                $session->setFlash('ok2','Вы успешно изменили статус пользователя!');
                return $this->refresh();
            }
        }
        return $this->render('ban',['user'=>$user,'blocked'=>$blocked,'model'=>$form]);
    }

}