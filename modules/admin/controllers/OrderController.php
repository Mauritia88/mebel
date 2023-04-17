<?php
namespace app\modules\admin\controllers;




use app\modules\admin\models\Order;

class OrderController extends AppAdminController {


    public function actionIndex()
    {
        $rows = Order::find()->all();
        return $this->render('index', [
            'rows' => $rows,
        ]);
    }


    public function actionAllow($id)
    {
        $comment = Order::findOne($id);
        if ($comment->allow()) {
            return $this->redirect(['index']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = Order::findOne($id);
        if ($comment->disallow()) {
            return $this->redirect(['index']);
        }
    }

    public function actionView($id)
    {
        $hits = Order::find()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'hits'=>$hits,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}