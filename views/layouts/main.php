<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);

$this->title = Yii::$app->name;

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
        	//'class' => 'navbar navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        //'options' => ['class' => 'navbar-nav navbar-right'],
    	'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
           // ['label' => 'Главная', 'url' => ['/site/index']],
        	['label' => 'Подстанции', 'url' => ['/ps/index']],
           // ['label' => 'О Нас', 'url' => ['/site/about']],
           // ['label' => 'Контакты', 'url' => ['/site/contact']],
        	['label' => 'Отчеты', 'url' => ['/site/about']],
        	['label' => 'Контакты', 'url' => ['/site/contact']],
        	[
        			'label' => 'Администрирование', 
        			'url' => ['#'],
        			'options'=>['class'=>'dropdown', 'role'=>'menu'],
        			'items'=>[
        				['label'=>'Пользователи','url'=>['/account/accounts']],
        				['label'=>'Test 2','url'=>['#']],
        				['label'=>'Test 3','url'=>['#']],
        			],
        			
	        ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->login . ')',
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
        <?= Alert::widget() ?>
        <?php 
        Pjax::begin();
        ?>
        <?= $content ?>
        <?php
        Pjax::end();
        ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php 
$this->endPage();

?>