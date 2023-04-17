<?php

namespace app\modules\admin\controllers;

use app\models\Order;
use app\models\Product;
use app\models\User;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $count = [];
        $article1 = Product::find()->where(['status_id' => 1])->count();
        $article2 = Product::find()->where(['status_id' => 2])->count();
        $article3 = Product::find()->where(['status_id' => 3])->count();
        $article4 = Product::find()->where(['status_id' => 4])->count();
        $article5 = Product::find()->where(['status_id' => 5])->count();
        $article6 = Product::find()->where(['status_id' => 6])->count();
        $article7 = Product::find()->where(['status_id' => 7])->count();
        $article8 = Product::find()->where(['status_id' => 8])->count();
        $articleall = Product::find()->count();
        $count['article1'] = $article1;
        $count['article2'] = $article2;
        $count['article3'] = $article3;
        $count['article4'] = $article4;
        $count['article5'] = $article5;
        $count['article6'] = $article6;
        $count['article7'] = $article7;
        $count['article8'] = $article8;
        $count['articleAll'] = $articleall;
        $country = Order::find()->where(['status' => 0])->count();
        $count['country'] = $country;
        $user = User::find()->count();
        $count['user'] = $user;
        return $this->render('index', [
            'count' => $count,
        ]);
    }

    public function actionUserv()
    {
        $rows = User::find()->all();
        return $this->render('userv', [
            'rows' => $rows,
        ]);
    }

    public function actionAllow($id)
    {
        $comment = User::findOne($id);
        if ($comment->allow()) {
            return $this->redirect(['userv']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = User::findOne($id);
        if ($comment->disallow()) {
            return $this->redirect(['userv']);
        }
    }
}
