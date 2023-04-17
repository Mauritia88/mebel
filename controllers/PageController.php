<?php
namespace app\controllers;

use app\models\Product;
use app\models\Page;
use yii\web\Controller;
use yii\web\HttpException;
use Yii;

class PageController extends Controller {

    /*
     * Главная страница сайта
     */
    public function actionIndex() {
        // получаем лидеров продаж
        $hitProducts = Yii::$app->cache->get('hit-products');
        if ($hitProducts === false) {
            $hitProducts = Product::find()->where(['status_id' => 8])->limit(3)->asArray()->all();
            Yii::$app->cache->set('hit-products', $hitProducts);
        }
        // получаем новые товары
        $newProducts = Yii::$app->cache->get('new-products');
        if ($newProducts === false) {
            $newProducts = Product::find()->where(['status_id' => 6])->limit(3)->asArray()->all();
            Yii::$app->cache->set('new-products', $newProducts);
        }
        // получаем товары распродажи
        $saleProducts = Yii::$app->cache->get('sale-products');
        if ($saleProducts === false) {
            $saleProducts = Product::find()->where(['status_id' => 7])->limit(3)->asArray()->all();
            Yii::$app->cache->set('sale-products', $saleProducts);
        }



        return $this->render(
            'index',
            compact('hitProducts', 'newProducts', 'saleProducts')
        );
    }

    /*
     * Произвольная страница сайта
     */
    public function actionView($slug) {
        if ($page = Page::find()->where(['slug' => $slug])->one()) {
            $this->setMetaTags(
                $page->name,
            );
            return $this->render(
                'view',
                ['page' => $page]
            );
        }
        throw new HttpException(404, 'Запрошенная страница не найдена');
    }
}