<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
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
                    <p class="h6"><em><?= Yii::$app->params['communication']; ?><br><?= Yii::$app->params['phone'] ?>
                        </em>
                    </p>
                </div>
                <div class="col-sm-4">
                    <p class="h6 align-middle float-left"><em><?= Yii::$app->params['address']; ?></em></p>
                </div>
            </div>
        </a>

        <?php
        NavBar::begin([
            'options' => [
                'class' => 'navbar navbar-expand-md bg-info bg-opacity-25',
            ],
        ]);
        echo Nav::widget([
            'activateItems' => true,
            'options' => ['class' => 'nav-pills nav-fill rounded w-100'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Админка', 'url' => ['/admin/default/index']],
                ['label' => 'Управление каталогом', 'url' => ['product/index']],
                ['label' => 'Управление заказами', 'url' => ['/admin/order/index']],
                ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
//                '<li class="nav-item nav-link text-secondary" >' . "(" . Yii::$app->user->identity->login . ")" . Yii::$app->user->identity->getFIO() . '</li>'
            ],
        ]);
        NavBar::end();
        ?>

    </header>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted bg-info bg-gradient bg-opacity-50">
        <div class="container">
            <p class="text-center">&copy;&#8482;МебельСофт-<?= date('Y'); ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>