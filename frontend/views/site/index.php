<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

/* @var $posts common\models\Post */
/* @var $top common\models\Post */

$this->title = 'WDblog - Home';
?>

<main>
    <section class="main-wrapper">
            <section class="top-posts">

                <?php foreach ($top as $one): ?>

                    <div class="top-post  __big">
                        <a href="page.html" class="post-link">
                            <img src="img/background/Rectangle 5.png" alt="" class="post-image">
                            <div class="post-title">
                                <div class="title-header">
                                    <p>Статьи | 02, Янв 2021</p>
                                </div>
                                <h2>5 Необходимых гаджета в 2021 году.</h2>
                                <div class="title-border"></div>
                                <div class="title-footer">
                                    <div class="post-views">
                                        <img src="img/icons/views.svg" alt="">
                                        <p>500</p>
                                    </div>
                                    <div class="post-bookmark">
                                        <img src="img/icons/bookmarks.svg" alt="">
                                        <p>20</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div id="border-open" class="top-post  __medium">
                        <a href="" class="post-link">
                            <img src="img/background/Rectangle 6.png" alt="" class="post-image">
                            <div class="post-title medium-title">
                                <div class="title-header">
                                    <p>Статьи | 02, Янв 2021</p>
                                </div>
                                <h2>5 Вещей которые вы должны знать о ReactJS</h2>
                                <div class="title-border"></div>
                                <div class="title-footer">
                                    <div class="post-views">
                                        <img src="img/icons/views.svg" alt="">
                                        <p>250</p>
                                    </div>
                                    <div class="post-bookmark">
                                        <img src="img/icons/bookmarks.svg" alt="">
                                        <p>50</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

        </section>
        <section class="best-posts">
            <div class="posts-block__title"><h2>Лучшее за неделю</h2></div>
            <div class="post-block">
                <?php foreach ($posts as $post): ?>
                <div class="post">
                    <a href="<?= $post->url; ?>" class="post-link">
                        <img src="/uploads/<?= $post->photo;?>" alt="" class="post-image">
                        <div class="post-title">
                            <div class="title-header">
                                <p><?= $post->category->title;?> | <?= $post->date;?></p>
                            </div>
                            <h2><?= $post->title;?></h2>
                            <div class="title-border"></div>
                            <div class="title-footer">
                                <div class="post-views">
                                    <img src="img/icons/views.svg" alt="">
                                    <p>250</p>
                                </div>
                                <div class="post-bookmark">
                                    <img src="img/icons/bookmarks.svg" alt="">
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="last-news">
            <div class="posts-block__title"><h2>Посление новости</h2></div>
            <div class="last-news__block">
                <div class="big-post">
                    <a href="#" class="post-link">
                        <img src="img/background/Rectangle 8.png" alt="" class="post-image">
                        <div class="post-title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 Вещей которые вы должны знать о ReactJS</h2>
                            <div class="title-border"></div>
                            <div class="title-footer">
                                <div class="post-views">
                                    <img src="img/icons/views.svg" alt="">
                                    <p>250</p>
                                </div>
                                <div class="post-bookmark">
                                    <img src="img/icons/bookmarks.svg" alt="">
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="small-post">
                    <a href="#" class="post-link">
                        <img src="img/background/Rectangle 9.png" alt="" class="post-image">
                        <div class="post-title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 Вещей которые вы должны знать о ReactJS</h2>
                            <div class="title-border"></div>
                            <div class="title-footer">
                                <div class="post-views">
                                    <img src="img/icons/views.svg" alt="">
                                    <p>250</p>
                                </div>
                                <div class="post-bookmark">
                                    <img src="img/icons/bookmarks.svg" alt="">
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="small-post __second">
                    <a href="#" class="post-link">
                        <img src="img/background/Rectangle 10.png" alt="" class="post-image">
                        <div class="post-title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 Вещей которые вы должны знать о ReactJS</h2>
                            <div class="title-border"></div>
                            <div class="title-footer">
                                <div class="post-views">
                                    <img src="img/icons/views.svg" alt="">
                                    <p>250</p>
                                </div>
                                <div class="post-bookmark">
                                    <img src="img/icons/bookmarks.svg" alt="">
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="new-posts">
            <div class="posts-block__title"><h2>Новые посты</h2></div>
            <div class="new-posts__block">
                <?php foreach ($posts as $post): ?>
                <div class="new-post">
                    <a href="<?= $post->url; ?>" class="new-post__link">
                        <img src="/uploads/<?= $post->photo;?>" alt="" class="post-image">
                        <div class="new-post__title">
                            <div class="title-header">
                                <p><?= $post->category->title?> | <?= $post->date;?></p>
                            </div>
                            <h2><?= $post->title;?></h2>
                            <div class="title-description">
                                <?= $post->description;?>
                            </div>
                            <div class="title-footer">
                                <div class="post-views">
                                    <img src="img/icons/views.svg" alt="">
                                    <p>250</p>
                                </div>
                                <div class="post-bookmark">
                                    <img src="img/icons/bookmarks.svg" alt="">
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               <?php endforeach;?>
                <section class="load-more__button">
                    <a href="" class="load-more">Больше постов</a>
                </section>
            </div>

            <!-- Сайдбар -->

            <aside class="posts-sidebar">
                <div class="posts-block__title"><h2>Топ</h2></div>

                <?php foreach ($posts as $post): ?>

                    <div class="sidebar-post">
                        <a href="/uploads/<?= $post->url; ?>" class="sidebar-post__link">
                            <img src="<?= $post->photo; ?>" alt="" class="post-image">
                            <div class="sidebar-post__title">
                                <div class="title-header">
                                    <p><?= $post->category->title; ?> | <?= $post->date; ?></p>
                                </div>
                                <h2><?= $post->title; ?></h2>
                                <div class="title-footer">
                                    <div class="post-views">
                                        <img src="img/icons/views.svg" alt="">
                                        <p>250</p>
                                    </div>
                                    <div class="post-bookmark">
                                        <img src="img/icons/bookmarks.svg" alt="">
                                        <p>50</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

            </aside>

        </section>
    </section>
</main>