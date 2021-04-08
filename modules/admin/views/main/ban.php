<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var  $user app\models\User */
/* @var  array $blocked  */

?>
<div class="users">
        <div class="col-md-12">
            <div class="theme">
                <h4 style="color: #2aabd2"><?= $user->email?></h4>
                <div>
                    <span class="badge"><?= $user->last_name." ".$user->name?></span>
                </div>
                <br>

                <hr>
            </div>

        </div>
</div>

<div class="col-md-12">

    <h3>Изменить статус</h3>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'status')->dropDownList($blocked,['options' =>[ $user->blocked => ['Selected' => true]]])->label('') ?>
    <div class="form-group">
        <?= Html::submitButton('Изменить статус', ['class' => 'btn btn-primary ']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php if (Yii::$app->session->hasFlash('ok2')):?>
        <div class="text-success"><?= Yii::$app->session->getFlash('ok2')?></div>
    <?php endif;?>
</div>