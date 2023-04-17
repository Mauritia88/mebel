<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';

?>
<div class="order-index">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-hover">
        <tr>
            <th>Имя</th>
            <th>email</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>Комментарий к заказу</th>
            <th>Дата заказа</th>
            <th>Сумма заказа</th>
            <th>Изменить статус</th>
            <th></th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td> <?= $row->name ?></td>
                <td><?= $row->email ?> </td>
                <td><?= $row->phone ?> </td>
                <td><?= $row->address ?> </td>
                <td><?= $row->comment ?> </td>
                <td><?= $row->created ?> </td>
                <td><?= $row->amount ?> </td>
                <?php if ($row->status): ?>
                    <td> Обработан</td>
                    <td><a class="btn btn-success"
                           href="<?= Url::toRoute(['order/disallow', 'id' => $row->id]); ?>">Disallow</a></td>
                <?php else: ?>
                    <td> Не обработан</td>
                    <td><a class="btn btn-warning"
                           href="<?= Url::toRoute(['order/allow', 'id' => $row->id]); ?>">Allow</a></td>
                <?php endif ?>
                <td><a class="btn btn-info"
                       href="<?= Url::toRoute(['order/view', 'id' => $row->id]); ?>">Просмотреть</a></td>
            </tr>
        <?php endforeach; ?>

    </table>


</div>

