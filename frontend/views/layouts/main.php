<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItemsDropdown = frontend\models\Menu::find()
        ->where(['is_display'=>1, 'type'=>1])
        ->orderBy('sort ASC')
        ->asArray()
        ->all();
    foreach ($menuItemsDropdown as $key => &$value) {
        $value['label'] = $value['name'];
        $value['url'] = Url::to([$value['url'], 'cid'=>$value['icon']]);
    }

    $menuItems[] = ['label' => 'Home', 'url' => Url::to(['/'])];
    $menuItems[] = [
        'label' => 'Category',
        'items' => $menuItemsDropdown,
    ];
    $menuItems[] = ['label' => 'Elastic', 'url' => Url::to(['site/elastic-search'])];
    $menuItems[] = ['label' => 'Contact', 'url' => Url::to(['site/contact'])];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => Url::to(['site/signup'])];
        $menuItems[] = ['label' => 'Login', 'url' => Url::to(['site/login'])];
    } else {
        $menuItems[] = [
            'label' => 'Personal Center',
            'items' => [
                ['label'=>'My Favorite', 'url'=>Url::to(['site/favorite-list'])],
                '<li class="divider"></li>',
                ['label'=>'Logout', 'url'=>Url::to(['site/logout'])],
            ],
        ];

        $logoutLi = '<li>'
            . Html::beginForm(Url::to(['site/logout']), 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
