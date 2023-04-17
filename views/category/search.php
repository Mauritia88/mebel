<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

?>


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
                <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                <?php if (!empty($products)): ?>
                <div class="features_items"><!--features_items-->

                    <div class="row masonry">
                        <?php foreach ($products as $product): ?>
                            <div class="col-lg-4 pb-3">
                                <div class="product-card p-3 border rounded">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img("@web/images/{$product->image}", ['alt' => $product->title]) ?>
                                            <h2>$<?= $product->price ?></h2>
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
                    <?php
                    echo LinkPager::widget(['pagination' => $pages]);
                    ?>
                    <?php else: ?>
                        <h3>Ничего не найдено...</h3>
                    <?php endif; ?>
                </div>
            </div><!--features_items-->
        </div>
    </div>
    </div>
</section>
	



