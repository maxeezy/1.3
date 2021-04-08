<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form ActiveForm */
/* @var $model app\models\ThemeAddForm */
?>

<div class="theme-add">
    <div class="row">
        <div class="col-md-12">
            <div class="h2 text-center">Добавление новой темы</div>
        </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput()->label('Заголовок') ?>
    <?= $form->field($model, 'text')->textarea()->label('Текст записи') ?>
    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary center-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
