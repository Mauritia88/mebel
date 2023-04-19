<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;

use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use kartik\nav\NavX;
use yii\bootstrap5\Modal;
use yii\bootstrap5\NavBar;

AppAsset::register($this);


$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header" class="bg-primary bg-gradient bg-opacity-25">
    <a class="text-decoration-none text-reset" href=<?= Yii::$app->homeUrl . 'site/index' ?>>
        <div class="row text-center align-items-center ">
            <div class="col">
                <p class="h1"><em>МебельСофт </em></p>
            </div>
            <div class="col-sm-3 align-middle float-left">
                <p class="h6"><em><?= Yii::$app->params['communication']; ?><br><?= Yii::$app->params['phone'] ?></em>
                </p>
            </div>
            <div class="col-sm-4">
                <p class="h6 align-middle float-left"><em><?= Yii::$app->params['address']; ?></em></p>
            </div>
        </div>
    </a>

    <?php
    NavBar::begin(['options' => ['class' => 'navbar navbar-expand-md bg-primary bg-opacity-35',],]);

    echo NavX::widget([
        'activateItems' => true,
        'options' => ['class' => 'navbar-nav navbar-right nav-pills nav-fill rounded w-100'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
//            ['label' => 'Категории', 'url' => ['/category/index']],
            ['label' => 'О магазине', 'url' => ['/site/about']],
            '<li class="nav-item"> 
                <a class="nav-link" href="/web/basket/index">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket align-middle" viewBox="0 0 16 16">
                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                </svg> Корзина
                </a>
                </li>',

            !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin  ?(
            ['label' => 'Админка', 'url' => ['/admin/default/index']]
            ) : '',


            Yii::$app->user->isGuest
                ? (['label' => 'Вход на сайт',
                'items' => [
//                    '<div class="dropdown-divider"></div>',
                    ['label' => 'Вход', 'url' => ['site/login']],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'Зарегистрироваться', 'url' => ['site/signup']],
                ],

            ]
            ) : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>',
            '<li><form class="d-flex" method="get" action="/web/category/search">
                <input class="form-control me-2" type="text" name="q" placeholder="Ищем...">
                <button class="btn btn-light" type="submit">Поиск</button>
                </form></li>',

        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted bg-info bg-gradient bg-opacity-50">
    <div class="container">
        <p class="text-center">&copy;&#8482;МебельСофт-<?= date('Y'); ?></p>
    </div>
</footer>

<?php
$footer =
    <<<FOOTER
<button type="button" class="btn btn-default" data-dismiss="modal">
    Продолжить покупки
</button>
FOOTER;
Modal::begin([
    'title' => '<h2>Корзина</h2>',
    'id' => 'basket-modal',
    'size' => 'modal-lg',
    'footer' => $footer
]);
Modal::end();
unset($footer);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
