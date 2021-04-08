<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\RegistrationForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class HomeController extends Controller
{



    public function actionRegistration()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegistrationForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->registration();
                return $this->render('registrationSuccess');
            }
        }

        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    public function actionLogin(){

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new  LoginForm();

        if ($model->load(Yii::$app->request->post())){
            if ($model->validate()){
                $model->login();
                return $this->goHome();
            }
        }

        $model->password = '';

        return $this->render('login',[
            'model' => $model
        ]);
    }

}