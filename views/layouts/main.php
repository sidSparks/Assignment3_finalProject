<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
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
        'brandLabel' => 'Ict confrence',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'regester', 'url' => ['/site/contact']],
            ['label' => 'Venue', 'url' => ['/site/about']],
            ['label' => 'Schedule', 'url' => ['/site/schedule']],
            ['label' => 'Speakers', 'url' => ['/site/speakers']],
           
            ['label' => 'Profile', 'url' => ['/user/profile']],
            ['label' => 'User Profile', 'url' => ['/user/settings/profile'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Admin', 'url' => ['/user/admin/index'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right">NAME: Sydney Parker * *   
   ID#: 2012022741 - - -</p>
        <p class="pull-left">&copy; My Applied Web Final Project <?= date('Y') ?></p>

<!--        <p class="pull-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>


   
<!--S<?php $this->endBody() ?>-->
</body>
</html>
<?php $this->endPage() ?>
