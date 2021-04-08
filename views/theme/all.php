<?php
/* @var $themes app\models\Theme */

use yii\helpers\Url;

?>

<div class="all">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center h2" style="padding-top: 10px;padding-bottom: 50px">Все темы на сайте</div>
        </div>
    </div>
    <div class="themes">
        <?php foreach ($themes as $theme):?>
            <div class="col-md-12">
                <div class="theme">
                    <h1><a href="<?= Url::toRoute(['theme/view','id'=>$theme->id]) ?>"><?=$theme->title?></a></h1>
                    <h4 style="color: #2aabd2"><?= $theme->user->email?></h4>
                    <?php if (strlen($theme->text)>150):?>
                        <p class="border border-light"><?=mb_substr($theme->text,0,149)."..."?></p>
                    <?php else:?>
                    <p class="border border-light"><?=$theme->text?></p>
                    <?php endif;?>
                    <div>
                        <span class="badge">Выложено <?=date('d.m.Y H:i:s',$theme->date)?></span>
                    </div>
                    <div>
                        <span class="badge">Ответов <?=count($theme->answers)?></span>
                    </div>
                    <hr>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
