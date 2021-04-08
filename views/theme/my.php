<?php
/* @var $themes app\models\Theme */

use yii\helpers\Url;

//var_dump($themes);
?>

<div class="my">
    <div class="row">
        <div class="col-md-12">
            <div class="h2 text-center" style="padding-top: 10px">Ваши темы</div>
        </div>
    </div>
    <div class="row">
        <div class="themes">
            <?php foreach ($themes as $theme):?>
                <div class="theme">
                    <?php if ($theme->status==2):?>
                        <h1><a href="<?= Url::toRoute(['theme/view','id'=>$theme->id]) ?>"><?=$theme->title?></a></h1>
                    <?php else:?>
                    <h1><?=$theme->title?></h1>
                    <?php endif;?>
                    <h4 style="color: #2aabd2"><?= $theme->user->email?></h4>
                    <p class="border border-light"><?=$theme->text?></p>
                    <div>
                        <span class="badge badge-success">Выложено <?=date('d.m.Y H:i:s',$theme->date)?></span>
                    </div>
                    <div>
                        <span class="<?php if ($theme->status==1):echo 'badge';elseif ($theme->status==2):echo 'badge badge-success';elseif ($theme->status==3):echo 'badge badge-warning';endif;?>"><?=$theme->status0->name?></span>
                    </div>
                    <hr>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
