<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $model app\models\ChangeStatus */
/* @var $comments app\models\Answer */
/* @var $theme app\models\Theme */
/* @var array $status app\models\Status */

?>
<div class="col-md-12">
    <div class="theme">
        <h1><?=$theme->title?></h1>
        <h4 style="color: #2aabd2"><?= $theme->user->email?></h4>
        <p class="border border-light"><?=$theme->text?></p>
        <div>
            <span class="badge">Выложено <?=date('d.m.Y H:i:s',$theme->date)?></span>
        </div>
        <hr>
    </div>
</div>
<div class="col-md-12">

    <h3>Изменить статус</h3>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'status')->dropDownList($status,['options' =>[ $theme->status => ['Selected' => true]]])->label('') ?>
    <div class="form-group">
        <?= Html::submitButton('Оставить коментарий', ['class' => 'btn btn-primary ']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php if (Yii::$app->session->hasFlash('ok')):?>
    <div class="text-success"><?= Yii::$app->session->getFlash('ok')?></div>
    <?php endif;?>
</div>
<div class="col-md-6">
    <div class="comments">
        <h3>Коментарии</h3>
        <hr>
        <?php if ($comments):?>
            <div class="all-comments">
                <?php foreach ($comments as $comment):?>
                    <div class="comment">
                        <div class="row">
                            <div class="col-md-6 text-primary"><?=$comment->user->email?></div>
                            <div class="col-md-6 text-dark"><?= date('d.m.Y H:i:s',$comment['date'])?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $comment['text']?>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach;?>
            </div>
        <?php else:?>
            <div class="h4">Ответов к этой теме еще не оставляли</div>
        <?php endif;?>
    </div>
</div>