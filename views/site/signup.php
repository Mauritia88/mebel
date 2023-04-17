<?php

/* @var $this yii\web\View */

/* @var $model app\models\LoginForm */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;


$this->title = 'Регистрация';

?>
<div class="site-login mr0">
    <br>
    <div class="col-md-8 col-md-offset-2">
        <div class="site-login">
            <h1>Регистрация</h1>
            <br>


            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-2 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
</div>

