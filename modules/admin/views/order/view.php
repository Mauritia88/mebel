<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;

\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

//            'user_id',
            'name',
            'email:email',
            'phone',
            'address',
            'comment',
            [
                'attribute' => 'amount',
                'label' => 'Стоимость'
            ],
            [
                'attribute' => 'Статус',
                'value' => function ($data) {
                    return $data->status ? 'Обработан' : 'Не обработан';
                }
            ],
            'created',
        ],
    ]) ?>


    <?= Html::label("Товары заказа:") ?>

    <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider(['allModels' => $model->getItems()->all()]),
        'columns' => [
//            'idorder_product',
            ['attribute' => 'Товар', 'value' => function ($model, $key) {
                return "id: " . $model->product_id . " " . $model->name;
            }],
            [
                'attribute' => 'quantity',
                'label' => 'Количество'
            ],
            [
                'attribute' => 'cost',
                'label' => 'Стоимость'
            ],

        ],
    ]);
    ?>
    <div class="row">
        <div class="col">Итого:</div>
        <div class="col-1"><?php $amount = 0;
            foreach ($model->getItems()->all() as $prod) {
                $amount += $prod->quantity * $prod->price;
            }
            echo $amount; ?> &#8381;
        </div>
    </div>


</div>
