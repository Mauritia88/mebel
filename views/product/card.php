<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url; ?>
<div class="product-card p-3 border rounded">
    <div style="max-width:400px;height:400px;">

        <div>
            <p class="text-end pt-1 <?= $model->status->getColorClass() ?>" style="position:relative;"><?= $model->status->status_product ?></p>
        </div>
        <div class="pb-2 mx-auto" style="height: 200px;width: 200px;">
            <?php echo Html::img($model->getImage(), ['class' => "img-fluid h-100", 'alt' => $model->title]); ?>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <a href="<?= Url::to(['product/view', 'id' => $model->id]) ?>"><?= $model->title ?></a>
                </p>
            </div>
            <div class="col-5 h5">
                <b><?= $model->price ?> &#8381;</b>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <b>Код товара: <?= $model->id ?></b>.
            </div>
        </div>
    </div>
    <div class="text-center">

            <?= Html::a('Смотреть', ['/product/view', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

    </div>


</div>