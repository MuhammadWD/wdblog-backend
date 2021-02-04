<?php

/* @var $this yii\web\View */
/* @var $post common\models\Post */
/* @var $categoryAside common\models\Post */

use yii\helpers\Url;

$this->title = $post->title;

?>

<section class="main-wrapper">
    <div class="back">
        <a href="" class="go-back__link"> <img src="assets/images/icons/back-caret.svg" alt=""> На главную</a>
    </div>
    <section class="single-post">
        <div class="single-posts__title">
            <div class="title-header">
                <a href="" class="category-link"><?= $post->category->title;?></a> | <time><?= $post->date; ?></time></div>
            <h1><?= $post->title; ?></h1>
            <div class="title-post__author">
                <a href="<?= Url::to(['/user/profile/view', 'nickname' => $post->author->nickname])?>" class="post-author">
                    <img src="assets/images/temp/pg_WCHWSdT8.png" alt="">
                    <p><?= $post->author->username ?></p>
                </a>
            </div>
        </div>
        <div class="single-post__image">
            <img class="post-image" src="/uploads/<?= $post->photo;?>" alt="">
        </div>
        <div class="single-post__content">
            <div class="post-text__content">
                <p><?= $post->content; ?></p>

                <!--<img src="assets/images/background/Rectangle 9.png" alt=""> -->

                <div class="tags-block">
                    <div class="tags-border"></div>
                    <ul class="tags-list">
                        <?php foreach ($post->tag as $tag): ?>
                            <li class="tags-item">
                                <a href="" class="tags-link">#<?= $tag->title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

            <!-- Сайдбар поста -->

            <aside class="posts-sidebar">

                <?php foreach ($categoryAside as $aside): ?>

                    <div class="sidebar-post">
                        <a href="#" class="sidebar-post__link">
                            <img src="uploads/<?= $aside->photo; ?>" alt="" class="post-image">
                            <div class="sidebar-post__title">
                                <div class="title-header">
                                    <p><?= $aside->title; ?></p>
                                </div>
                                <h2><?= $aside->description; ?></h2>
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

                <?php endforeach; ?>

            </aside>

        </div>

        <!-- Рекомендации -->

        <section class="recommended-posts__block">
            <div class="posts-block__title"><h2>Рекомендации</h2></div>
            <div class="recommended-posts">
                <div class="recommended-post">
                    <a href="#" class="recommended-post__link">
                        <img src="assets/images/background/Rectangle 10.png" alt="" class="post-image">
                        <div class="recommeded-post__title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 необходимых гаджета в 2021 году</h2>
                        </div>
                    </a>
                </div>
                <div class="recommended-post">
                    <a href="#" class="recommended-post__link">
                        <img src="assets/images/background/Rectangle 10.png" alt="" class="post-image">
                        <div class="recommeded-post__title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 необходимых гаджета в 2021 году</h2>
                        </div>
                    </a>
                </div>
                <div class="recommended-post">
                    <a href="#" class="recommended-post__link">
                        <img src="assets/images/background/Rectangle 10.png" alt="" class="post-image">
                        <div class="recommeded-post__title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 необходимых гаджета в 2021 году</h2>
                        </div>
                    </a>
                </div>
                <div class="recommended-post">
                    <a href="#" class="recommended-post__link">
                        <img src="assets/images/background/Rectangle 10.png" alt="" class="post-image">
                        <div class="recommeded-post__title">
                            <div class="title-header">
                                <p>Статьи | 02, Янв 2021</p>
                            </div>
                            <h2>5 необходимых гаджета в 2021 году</h2>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <div class="comments-block">
            <div class="posts-block__title"><h2>Комментарии</h2></div>
            <div class="comments-content">

                <div class="comment-write__block">
                    <form class="comment-send">
                        <div class="textarea-form">
                            <textarea  rows="1" name="comment-text" placeholder="Написать комментарий" class="comments-textarea" data-autoresize></textarea>
                        </div>
                        <button type="submit" class="submit-button">Отправить</button>
                    </form>
                </div>

                <div class="comment">
                    <div class="user-information">
                        <div class="user-image"><img src="assets/images/temp/t3zrEm88ehc.png" alt=""></div>
                        <div class="text-info">
                            <div class="username">Magomed Gasanov</div>
                            <div class="status">Опубликовано <span>4 января, 2021</span></div>
                        </div>
                    </div>
                    <div class="comment-text">
                        Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования
                        конкурентов ассоциативно распределены по отраслям. Активно развивающиеся страны
                        третьего мира лишь добавляют фракционных разногласий и функционально разнесены на
                        независимые элементы.
                    </div>

                    <div class="comment-button">
                        <button class="reply-btn">Ответить</button>
                    </div>

                    <div class="sub-comment">
                        <div class="reply-icon"><img src="assets/images/icons/reply.svg" alt=""></div>
                        <div class="sub-comment__body">
                            <div class="user-information">
                                <div class="user-image"><img src="assets/images/temp/t3zrEm88ehc.png" alt=""></div>
                                <div class="text-info">
                                    <div class="username">Magomed Gasanov</div>
                                    <div class="status">Опубликовано <span>4 января, 2021</span></div>
                                </div>
                            </div>
                            <div class="comment-text">
                                Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования
                                конкурентов ассоциативно распределены по отраслям. Активно развивающиеся страны
                                третьего мира лишь добавляют фракционных разногласий и функционально разнесены на
                                независимые элементы.
                            </div>

                            <div class="comment-button">
                                <button class="reply-btn">Ответить</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="user-information">
                        <div class="user-image"><img src="assets/images/temp/t3zrEm88ehc.png" alt=""></div>
                        <div class="text-info">
                            <div class="username">Magomed Gasanov</div>
                            <div class="status">Опубликовано <span>4 января, 2021</span></div>
                        </div>
                    </div>
                    <div class="comment-text">
                        Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования
                        конкурентов ассоциативно распределены по отраслям. Активно развивающиеся страны
                        третьего мира лишь добавляют фракционных разногласий и функционально разнесены на
                        независимые элементы...<button class="show-more__btn __more-text">Развернуть</button>
                    </div>

                    <div class="comment-button">
                        <button class="reply-btn">Ответить</button>
                    </div>

                </div>
                <div class="comment">
                    <div class="user-information">
                        <div class="user-image"><img src="assets/images/temp/t3zrEm88ehc.png" alt=""></div>
                        <div class="text-info">
                            <div class="username">Magomed Gasanov</div>
                            <div class="status">Опубликовано <span>4 января, 2021</span></div>
                        </div>
                    </div>
                    <div class="comment-text">
                        Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования
                        конкурентов ассоциативно распределены по отраслям. Активно развивающиеся страны
                        третьего мира лишь добавляют фракционных разногласий и функционально разнесены на
                        независимые элементы.
                    </div>

                    <div class="comment-button">
                        <button class="reply-btn">Ответить</button>
                    </div>

                    <div class="sub-comment">
                        <div class="reply-icon"><img src="assets/images/icons/reply.svg" alt=""></div>
                        <div class="sub-comment__body">
                            <div class="user-information">
                                <div class="user-image"><img src="assets/images/temp/t3zrEm88ehc.png" alt=""></div>
                                <div class="text-info">
                                    <div class="username">Magomed Gasanov</div>
                                    <div class="status">Опубликовано <span>4 января, 2021</span></div>
                                </div>
                            </div>
                            <div class="comment-text">
                                Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования
                                конкурентов ассоциативно распределены по отраслям. Активно развивающиеся страны
                                третьего мира лишь добавляют фракционных разногласий и функционально разнесены на
                                независимые элементы.
                            </div>

                            <div class="comment-button __many-buttons">
                                <button class="reply-btn">Ответить</button>
                                <button class="show-more__btn">Показать еще</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-button"><button class="show-more__btn __more-comments">Больше комментов</button></div>
            </div>
        </div>
    </section>
</section>
