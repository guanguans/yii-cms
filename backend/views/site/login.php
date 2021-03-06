﻿<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

// $this 代表视图对象
LoginAsset::register($this);
$this->params['breadcrumbs'][] = $this->title;
$this->title = '登录';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="H+后台主题,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题。">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="gray-bg">
    <?php $this->beginBody() ?>
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">琯</h1>
            </div>
            <!-- <h3>欢迎使用 H+</h3> -->
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'm-t'],
            ]) ?>
            <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=>$model->username])->label(false) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
            </div>
            <div class="form-group">
                <?= yii\captcha\Captcha::widget([
                    'name'=>'captchaimg',
                    'captchaAction'=>'site/captcha',
                    'imageOptions'=>[
                        'id'=>'captchaimg',
                        'title'=>'换一个',
                        'alt'=>'换一个',
                        'style'=>'cursor:pointer;',
                        'onclick' => 'this.src=this.src+"&c="+Math.random();'
                     ],
                     'template'=>'{image}'
                 ]);?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'verifyCode')->textInput()->label(false) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            <?php ActiveForm::end() ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
<?php $this->registerJs($this->blocks['captchaJS'], View::POS_END); ?>
</html>
<?php $this->endPage() ?>
