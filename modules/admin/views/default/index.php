<?php
use yii\helpers\Html;
$this -> title = 'Добро пожаловать!';
?>
<h1 class="text-center">Статистика по сайту</h1>
<table class="table table-hover">

    <tr>
        <td>Всего товаров</td>
        <td><?=Html::a($count['articleAll'], ['product/index']) ?></td>
    </tr>
    <tr>
        <td>Товаров в наличии</td>
        <td><?= $count['article1']?></td>
    </tr>
    <tr>
        <td>Товар заканчивается</td>
        <td><?= $count['article2']?></td>
    </tr>
    <tr>
        <td>Товаров под заказ</td>
        <td><?= $count['article3']?></td>
    </tr>
    <tr>
        <td>Товаров ожидается</td>
        <td><?= $count['article4']?></td>
    </tr>
    <tr>
        <td>Товаров нет в наличии</td>
        <td><?= $count['article5']?></td>
    </tr>
    <tr>
        <td>Товары новинки</td>
        <td><?= $count['article6']?></td>
    </tr>
    <tr>
        <td>Распродажа товаров</td>
        <td><?= $count['article7']?></td>
    </tr>
    <tr>
        <td>Товары хит продаж</td>
        <td><?= $count['article8']?></td>
    </tr>
    <tr>
        <td>Заказов в обработке</td>
        <td><?=Html::a($count['country'], ['order/index']) ?></td>
    </tr>
    <tr>
        <td>Пользователей</td>
        <td><?=Html::a($count['user'], ['default/userv']) ?></td>
    </tr>
</table>