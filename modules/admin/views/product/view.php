<?php


use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;

\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <br><br>
    <div class="row">


        <div class="col-md-3 col-sm-9 padding-right">
            <div class="pb-2 mx-auto" style="height: 300px;width: 300px;">
                <?php echo Html::img($model->getImage(), ['class' => "img-fluid h-100", 'alt' => $model->title]); ?>
            </div>
            <div class="pb-2 <?= $model->status->getColorClass() ?>">
                <?= $model->status == 6 ? "Новинка, в наличии." : $model->status->status_product ?>
            </div>
        </div>

        <div class="col-md-6 col-sm-9">
            <h2><?= Html::encode($this->title) ?></h2>
            Описание: <?= $model->desc ?><br>

            <br><br><br>
            <p class="h4"><b>Цена: </b><?= $model->price ?> &#8381;</p>


        </div>

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Рекомендуем</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner masonry row">
                    <?php foreach ($hits as $hit): ?>

                        <div class="col-lg-4 pb-3">
                            <div class="product-card p-3 border rounded">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <?= Html::img("@web/images/{$hit->image}", ['class' => "img-fluid h-100", 'alt' => $hit->title]); ?>
                                        <h2><?php $hit->price ?></h2>
                                        <p>
                                            <a href="<?= Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->title ?></a>
                                        </p>
                                        <?= Html::a('Смотреть', ['product/view', 'id' => $hit->id], ['class' => 'btn btn-warning']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php endforeach; ?>
                </div>
            </div>
        </div><!--/recommended_items-->

    </div>
</div>
