<?php
    /* @var $user common\models\User */
    /* @var $posts common\models\Post */
    /* @var $currentUser common\models\User */

use yii\helpers\Url;


$this->title = $user->username . ' — ' . 'Личный кабинет';
?>


<main>
    <section class="account-wrapper">
        <div class="profiles-block">

            <?php if ($currentUser && $user->equals($currentUser)): ?>
                <section class="profile-settings">

                    <!-- Edit profile button -->

                    <div class="edit-profile">
                        <a href="<?= url::to(['/user/profile/update']); ?>" class="edit-link popup-btn" data-path="popup-edit">
                            <img src="/img/icons/edit.svg" alt="">
                        </a>
                    </div>

                    <!-- Exit button -->

                    <div class="exit-profile">
                        <a href="<?= url::to(['/user/profile/update']); ?>" class="exit-link" data-path="popup-edit">
                            <img src="/img/icons/exit.svg" alt="">
                        </a>
                    </div>

                </section>
            <?php endif;?>

            <!-- Profile background -->

            <div class="background-image"><img src="/img/temp/1Z2niiBPg5A.png" alt=""></div>

            <div class="profiles-data">
                <div class="profile-avatar"><img src="<?= $user->getImage(); ?>" alt=""></div>
                <div class="profile-nickname"><?= $user->username?></div>

                <div class="profiles-socialm">
                    <ul class="social-list">
                        <li class="social-item">
                            <a href="" class="socila-link">
                                <img src="/img/icons/social/entypo-social_vk-with-circle.svg" alt="">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="" class="socila-link">
                                <img src="/img/icons/social/ant-design_google-circle-filled.svg" alt="">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="" class="socila-link">
                                <img src="/img/icons/social/bx_bxl-facebook-circle.svg" alt="">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="" class="socila-link">
                                <img src="/img/icons/social/ant-design_twitter-circle-filled.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Посты профиля -->

        <div class="profile-posts">

            <!-- Title -->

            <?php if ($currentUser && !$user->equals($currentUser)): ?>

            <div class="profile-posts__title">
                <h1 class="title">Статьи автора</h1>
                <?php if(!$currentUser->isFollowing($user)): ?>
                    <div class="subscribe">
                        <a href="<?= url::to(['profile/follow', 'id' => $user->getId()]); ?>"
                        class="subscribe">Подписаться</a>
                        <img src="/img/icons/notifications.svg" alt="">
                    </div>
                <?php else: ?>
                    <div class="subscribe">
                        <a href="<?= url::to(['profile/unfollow', 'id' => $user->getId()]); ?>"
                           class="subscribe">Подписаться</a>
                        <img src="/img/icons/notifications.svg" alt="">
                    </div>
                <?php endif; ?>

            </div>

            <?php else: ?>

            <div class="profile-posts__title">
                <h1 class="title">Мои статьи</h1>
                <div class="subscribe">
                    <a href="<?= url::to(['/post/default/create']); ?>" class="subscribe">Написать статью</a>
                    <img src="/img/icons/add.svg" alt="">
                </div>
            </div>

            <?php endif;?>

            <!-- Posts -->

            <section class="top-posts">

                <?php foreach ($posts as $post): ?>

                    <?php while ($post <= 1): ?>

                    <div class="top-post __big">
                        <a href="page.html" class="post-link">
                            <img src="/uploads/<?= $post->photo; ?>" alt="" class="post-image">
                            <div class="post-title">
                                <div class="title-header">
                                    <p><?= $post->category->title; ?> | <?= $post->date; ?></p>
                                </div>
                                <h2><?= $post->title; ?></h2>
                                <div class="title-border"></div>
                                <div class="title-footer">
                                    <div class="post-views">
                                        <img src="/img/icons/views.svg" alt="">
                                        <p>500</p>
                                    </div>
                                    <div class="post-bookmark">
                                        <img src="/img/icons/bookmarks.svg" alt="">
                                        <p>20</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php endwhile; ?>

                <?php endforeach; ?>
                <div class="top-post __medium">
                    <a href="" class="post-link">
                        <img src="/img/background/Rectangle 6.png" alt="" class="post-image">
                        <div class="post-title medium-title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 Вещей которые вы должны знать о ReactJS</h2>
                            <div class="title-border"></div>
                            <div class="title-footer">
                                <div class="post-views">
                                    <img src="/img/icons/views.svg" alt="">
                                    <p>250</p>
                                </div>
                                <div class="post-bookmark">
                                    <img src="/img/icons/bookmarks.svg" alt="">
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </section>
            <section class="best-posts">
                <div class="post-block">

                    <?php foreach ($posts as $post): ?>

                    <div class="post">
                        <a href="#" class="post-link">
                            <img src="/uploads/<?= $post->photo; ?>" alt="" class="post-image">
                            <div class="post-title">
                                <div class="title-header">
                                    <p><?= $post->category->title; ?> | <?= $post->date; ?></p>
                                </div>
                                <h2><?= $post->title; ?></h2>
                                <div class="title-border"></div>
                                <div class="title-footer">
                                    <div class="post-views">
                                        <img src="/img/icons/views.svg" alt="">
                                        <p><?= $post->viewed?></p>
                                    </div>
                                    <div class="post-bookmark">
                                        <img src="/img/icons/bookmarks.svg" alt="">
                                        <p>50</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php endforeach; ?>

            </section>
            <section class="load-more__button">
                <a href="" class="load-more">Больше постов</a>
            </section>
        </div>
    </section>
</main>