<?php
/* @var  $users app\models\User */
/* @var  array $blocked  */
?>

<div class="col-md-12">
    <div class="h3 text-center">Все пользователи сайта</div>
</div>

<div class="users">
    <?php foreach ($users as $user):?>
    <div class="col-md-12">
        <div class="theme">
            <h4 style="color: #2aabd2"><?= $user->email?></h4>
            <div>
                <span class="badge"><?= $user->last_name." ".$user->name?></span>
            </div>
            <div>
                <span class="badge"><?= $blocked[$user->blocked]?></span>
            </div>
            <br>
            <a class="btn btn-primary" href="<?= \yii\helpers\Url::toRoute(['main/ban', 'id' => $user->id]) ?>">Администрировать</a>
            <hr>
        </div>

    </div>
    <?php endforeach;?>
</div>

