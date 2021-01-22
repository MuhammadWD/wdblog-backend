<?php

use dosamigos\fileupload\FileUpload;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $modelImage frontend\modules\user\models\forms\ImageForm */

$this->title = Yii::t('app', 'Редактирование профиля');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', Yii::$app->user->identity->username),
    'url' => ['view', 'nickname' => Yii::$app->user->identity->nickname]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= FileUpload::widget([
            'model' =>  $modelImage,
            'attribute' => 'image',
            'url' => ['/user/profile/upload-image'],
            'options' => ['accept' => 'image/*'],
            'clientEvents' => [
                'fileuploaddone' => 'function(e, data) {
                    if (data.result.success) {
                    $("#profile-image-fail").hide();
                    $("#profile-picture").attr("src", data.result.pictureUri);
                } else {
                    $("#profile-image-fail").html(data.result.errors.picture).show();
                }
                }',
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'currentPassword')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>