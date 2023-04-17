<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;


/** @var yii\web\View $this */
/** @var app\models\Category $model */

?>
<div class="category-view">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->

    <section>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Категории</h2>
                        <ul class="catalog category-products">
                            <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                        </ul>
                    </div>
                </div>


                <div class="col-sm-9 padding-right">
                    <?php if (!empty($products)): ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center"><?= $category->name ?></h2>
                        <div class="row masonry">
                            <?php foreach ($products as $product): ?>
                                <div class="col-lg-4 pb-3">
                                    <div class="product-card p-3 border rounded">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?= Html::img("@web/images/{$product->image}", ['alt' => $product->title]) ?>
                                                <h2><?= $product->price ?> руб.</h2>
                                                <p>
                                                    <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->title ?></a>
                                                </p>
                                                <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"
                                                   data-id="<?= $product->id ?>"
                                                   class="btn btn-default add-to-cart"><i
                                                            class=""></i>Смотреть</a>
                                            </div>
                                            <?php if ($product->status_id == 6): ?>
                                                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                            <?php endif; ?>
                                            <?php if ($product->status_id == 7): ?>
                                                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="clearfix"></div>
                        <?php
                        echo LinkPager::widget(['pagination' => $pages]);
                        ?>
                        <?php else: ?>
                            <h2 class="title text-center"><?= $category->name ?></h2>
                            <h3>В выбранной категории товаров НЕТ</h3>
                        <?php endif; ?>

                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>


</div>
