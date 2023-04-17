<?php

use app\models\Category;
use app\models\StatusProduct;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>
    <br>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                ['prompt' => 'Укажите категорию'])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(StatusProduct::find()->all(), 'id', 'status_product'),
                ['prompt' => 'Укажите статус товара'])->label(false); ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
