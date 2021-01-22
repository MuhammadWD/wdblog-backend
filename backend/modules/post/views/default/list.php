<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $post common\models\Post */
/* @var $searchModel backend\modules\post\models\AllPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'New posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => function($post){
                    return Html::img($post->getImage(), ['width' => '150px']);
                }
            ],
            'title',
            'description:ntext',
            'date:datetime',
            [
                'attribute' => 'author_id',
                'format' => 'html',
                'value' => function($post){
                    return Html::a($post->author->username, Url::to(['/user/default/view', 'nickname' => $post->author->nickname]));
                }
            ],
            'url:url',
            [
                'label' => 'Actions',
                'format' => 'html',
                'value' => function($post){
                    return Html::a('View', ['view', 'url' => $post->url], ['class' => 'btn btn-primary']);
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>