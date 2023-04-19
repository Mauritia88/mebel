<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row ml-auto">
        <div class="col-lg-8">
            <?= $form->field($model, 'title')->textInput(['placeholder' => "Название"])->label(false) ?>
        </div>
        <div class="col-lg-4">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Очистить', ['onclick' => 'window.location.replace(window.location.pathname);',
                'class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>


    <?php ActiveForm::end(); ?>

</div>
