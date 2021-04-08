<?php


namespace app\controllers;


use app\models\Answer;
use app\models\CommentAddForm;
use app\models\Theme;
use app\models\ThemeAddForm;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UnauthorizedHttpException;


class ThemeController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->blocked==1){
            throw new UnauthorizedHttpException("Вы были заблокированы на форуме");
             return false;
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public  function  actionAdd(){
        if (Yii::$app->user->isGuest) {
            return $this->render('onlyRegister');
        }

        $model = new ThemeAddForm();
        if ($model->load(Yii::$app->request->post())){
            if ($model->validate()){
                $model->addTheme();
                return $this->render('addSuccess');
            }
        }

        return $this->render('add',['model'=>$model]);
    }

    public function actionView($id){
        $theme = Theme::findOne($id);
        if (!$theme||($theme->status!=2)){
            return $this->goHome();
        }

        $comments = Answer::getAllByIdTheme($id);



        $model = new CommentAddForm();

        if ($model->load(Yii::$app->request->post())){
            if ($model->validate()){
                $model->addComment($id);
                $this->refresh();

            }
        }

        return $this->render('view',['model'=>$model,'comments'=>$comments,'theme'=>$theme]);
    }

    public function actionMy(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $themes = Theme::getUsersTheme(Yii::$app->user->identity->id);
        return $this->render('my',['themes'=>$themes]);
    }

    public function actionAll(){
        $themes = Theme::find()->where(['status'=>2])->all();
        return $this->render('all',['themes'=>$themes]);
    }
}