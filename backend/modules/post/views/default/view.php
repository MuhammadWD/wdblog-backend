<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="post-view">

    <p>
        <?= Html::a('Update', ['update', 'url' => $model->url], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'url' => $model->url], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'default',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:url',
            'description:ntext',
            'content:ntext',
            'date:datetime',
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => function($model){
                    return Html::img($model->getImage(), ['width' => '350px']);
                }
            ],
            'viewed',
            [
                'attribute' => 'author_id',
                'format' => 'html',
                'value' => function($model){
                    return Html::a($model->author->username, Url::to(['/user/default/view', 'nickname' => $model->author->nickname]));
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($model){
                    if($model->status == 1) return 'Опубликован';
                    else return 'В редакции';
                }
            ],
            [
                'attribute' => 'category_id',
                'format' => 'html',
                'value' => function($model){
                    return Html::tag('p',$model->category->title);
                }
            ]
        ],
    ]) ?>

</div>
