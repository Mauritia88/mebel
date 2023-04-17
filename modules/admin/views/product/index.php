<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты';

?>
<div class="product-index">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="form-group row">
        <div class="col-3">
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-9">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'desc:ntext',
            'price',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img($data->getImage(), ['width' => 150]);
                }
            ],
            [
                'attribute' => 'Категория',
                'value' => function ($data) {
                    return \app\models\Category::findOne(['id' => $data->category_id])->name;
                }
            ],
            [
                'attribute' => 'Статус',
                'value' => function ($data) {
                    return \app\models\StatusProduct::findOne(['id' => $data->status_id])->status_product;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
