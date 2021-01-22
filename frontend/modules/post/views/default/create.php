<?php

use common\models\Tag;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\post\models\forms\PostForm */
/* @var $category yii\db\ActiveRecord[] */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Создание поста';
?>


<main>

    <section class="main-wrapper">

        <div class="create-post__body">

            <div class="posts-block__title"><h2>Новый пост</h2></div>

            <?php $form = ActiveForm::begin(); ?>

                <div class="title-form create-post">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название поста'); ?>
                </div>

                <div class="description-form create-post">
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Описание'); ?>
                </div>

                <div class="personal-buttons create-post-btn">
                    <?=  $form->field($model, 'image')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => true,
                            'browseClass' => 'btn btn-primary btn-block',
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' =>  'Загрузить фото'
                        ],
                    ]); ?>
                    <div class="images-name"><?= $model->image; ?></div>
                </div>

                <div class="category-form create-post">
                    <?= $form->field($model, 'category')
                        ->dropDownList(ArrayHelper::map($category, 'id', 'title'), ['class' => 'category-select'])
                        ->label('Категория'); ?>
                </div>

                <div class="content-form create-post">
                    <?= $form->field($model, 'content')->widget(Widget::className(), [
                        'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 400,
                            'imageUpload' => Url::to(['uploads/images/', 'sub'=>'default']),
                            'plugins' => [
                                'fullscreen',
                            ],
                        ],
                    ])->label('Содержание');
                    ?>
                </div>

                <div class="url-form create-post">
                    <?= $form->field($model, 'url')->textInput()->label('ЧПУ'); ?>
                </div>

                <div class="tags-form create-post">
                    <?= $form->field($model, 'tags_val')
                        ->dropDownList(ArrayHelper::map($category, 'id', 'title'), ['id' => 'tag'])
                        ->label('Тэги'); ?>
                </div>

                <div class="date-form create-post">
                    <?= $form->field($model, 'date')->widget(DatePicker::className(),[
                        'options' => ['placeholder' => 'Select time...'],
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'todayHighlight' => true],
                    ])->label('Дата');  ?>
                </div>

                <div class="button-block">
                    <?= Html::submitButton('Создать', ['class' => 'load-image buttn create-post-submit']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>

    </section>

</main>