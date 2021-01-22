<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'nickname' => $model->nickname], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nickname' => $model->nickname], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($user){
                    return Html::img($user->getImage(), ['width' => '400px', 'object-fit' => 'cover']);
                }
            ],
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
            'created_at:datetime',
        ],
    ]) ?>

</div>
