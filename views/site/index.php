<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<section>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-2">
                <div class="left-sidebar">
                    <h2>Категории</h2>

                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-10 padding-right">
                <!--                <div class="product-index">-->
                <!--                    <h1 class="text-center text-success"><em>-->
                <? //= Html::encode($this->title) ?><!--</em></h1>-->
                <!--                    <div class="row">-->
                <!--                        --><?php //foreach ($dataProvider->getModels() as $key => $model) : ?>
                <!--                            <div class="col-lg-4 col-md-6 col-sm-12 pb-4">-->
                <!--                                --><?php //echo $this->render('/product/card', ['model' => $model]); ?>
                <!--                            </div>-->
                <!--                        --><?php //endforeach; ?>
                <!--                    </div>-->
                <!--                    --><? //= GridView::widget(['dataProvider' => $dataProvider, 'layout' => "{pager}\n",]); ?>
                <!--                </div>-->

                <?php if (!empty($hits)): ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Популярные товары</h2>
                        <div class="row masonry">
                            <?php foreach ($hits as $hit): ?>
                                <div class="col-lg-4 pb-3">
                                    <?php echo $this->render('/product/card', ['model' => $hit]); ?>
                                </div>
<!--                                <div class="item">-->
<!--                                    <div class="product-image-wrapper">-->
<!--                                        <div class="single-products">-->
<!--                                            <div class="productinfo text-center">-->
<!--                                                --><?//= Html::img("@web/images/{$hit->image}", ['alt' => $hit->title]) ?>
<!--                                                <h2>--><?//= $hit->price ?><!--руб</h2>-->
<!--                                                <p>-->
<!--                                                    <a href="--><?//= Url::to(['product/view', 'id' => $hit->id]) ?><!--">--><?//= $hit->title ?><!--</a>-->
<!--                                                </p>-->
<!--                                                <a href="--><?//= Url::to(['cart/add', 'id' => $hit->id]) ?><!--"-->
<!--                                                   data-id="--><?//= $hit->id ?><!--" class="btn btn-default add-to-cart"><i-->
<!--                                                            class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                            </div>-->
<!--                                --><?php //if ($model->status_id == 6): ?>
<!--                                    --><?//= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
<!--                                --><?php //endif; ?>
<!--                                --><?php //if ($model->status_id == 7): ?>
<!--                                    --><?//= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
<!--                                --><?php //endif; ?>
<!--                                        </div>-->
<!--                                        <div class="choose">-->
<!--                                            <ul class="nav nav-pills nav-justified">-->
<!--                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>-->
<!--                                                </li>-->
<!--                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                            <?php endforeach; ?>
                        </div>
                    </div><!--features_items-->
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>