<?php

/* @var $this yii\web\View */
/* @var $post common\models\Post */

use yii\helpers\Url;

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= $post->title; ?></h1>
    <h2><?= $post->date; ?> | <?= $post->category->title;?></h2>
    <img src="/uploads/<?= $post->photo;?>" style="width: 1200px; height: 500px; object-fit: cover; ">
    <p><?= $post->content; ?></p>


    <h3 class="well" >Тэги: <?php foreach ($post->tag as $tag): ?>
                <?= $tag->title; ?>
        <?php endforeach; ?>
    </h3>
    <h4>Author: <a href="<?= Url::to(['/user/profile/view', 'nickname' => $post->author->nickname])?>">
            <?= $post->author->username ?>
        </a></h4>
</div>
