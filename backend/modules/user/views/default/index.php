<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $searchModel backend\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($user){
                    return Html::img($user->getImage(), ['width' => '150px']);
                }
            ],
            'username',
            'email:email',
            'nickname',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($user){
                    if($user->status == 10) return 'Активирован';
                    else if($user->status == 9) return 'Неактивирован';
                    else return 'Заблокирован';
                }
            ],
            [
                'label' => 'Created',
                'attribute' => 'created_at',
                'format' => 'datetime'
            ],
            [
                'label' => 'Actions',
                'format' => 'html',
                'value' => function($user){
                    return Html::a('View', ['view', 'nickname' => $user->nickname], ['class' => 'btn btn-primary']);
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
