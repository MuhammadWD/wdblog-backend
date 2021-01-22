<?php

use hail812\adminlte3\widgets\Menu;
use yii\helpers\Html;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=\yii\helpers\Url::home()?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="object-fit: cover;">
        <span class="brand-text font-weight-bold">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?= Html::a(Yii::$app->user->identity->username,
                    ['/user/default/view', 'nickname' => Yii::$app->user->identity->nickname], ['class' => 'd-block']) ?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            echo Menu::widget([
                'items' => [
                    [
                        'label' => 'Dashboard',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Home', 'url' => ['/site/index'], 'icon' => 'home'],
                            ['label' => 'Posts', 'url' => ['/post/default/list/'], 'icon' => 'list-ul'],
                            ['label' => 'Yii2 PROVIDED', 'header' => true],
                            ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Gii',  'icon' => 'code', 'url' => ['/gii'], 'target' => '_blank'],
                            ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                        ]
                    ],
                    ['label' => 'Management', 'header' => true],
                    [
                            'label' => 'Users tools',
                            'icon' => 'users',
                            'items' => [
                            ['label' => 'Profiles', 'url' => ['/user/default/index/'], 'icon' => 'user'],
                            ['label' => 'Roles', 'url' => ['/user/roles/index/'], 'icon' => 'key'],
                        ]
                    ],
                    [
                        'label' => 'Posts tools',
                        'icon' => 'pen',
                        'items' => [
                            ['label' => 'New posts', 'url' => ['/post/default/index/'], 'icon' => 'bookmark'],
                            ['label' => 'Categories', 'url' => ['post/category/index/'], 'icon' => 'tag'],
                            ['label' => 'Tags', 'url' => ['/tag/index/'], 'icon' => 'tags'],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>