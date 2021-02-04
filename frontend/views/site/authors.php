<?php

/* @var $this yii\web\View */
/* @var $authors common\models\User*/

use yii\helpers\Url;


$this->title = 'WDblog - Authors';

?>

<main>

    <section class="main-wrapper">

        <div class="category-block">

            <!-- Хедер категории -->

            <div class="category-block__header">

                <div class="category-title"><h1>Популярные авторы</h1></div>


                <!-- Поисковик категории -->

                <div class="category-searchbox">

                    <input class="searchbox-input" type="text" placeholder="Поиск по категории..">
                    <button class="search-button"><img src="img/icons/search.svg" alt=""></button>

                </div>
            </div>

            <!-- Популярные авторы -->

            <div class="popular-authors__block">

                <?php foreach ($authors as $author): ?>

                    <?php for ($number = 0; $number <= 3; $number++): ?>

                        <div class="author first">

                            <!--  Authors image  -->

                            <a href="" class="author-image__link">
                                <div class="author-image profile-avatar">
                                    <img src="<?= $author->getImage(); ?>" alt="">
                                </div>
                            </a>

                            <!--  Authors description  -->

                            <div class="author-description">

                                <div class="author-name"><?= $author->username; ?></div>

                                <div class="account-info">
                                    <div class="author-nickname">@<?= $author->nickname?></div>
                                    <div class="post-views">
                                        <img src="/img/icons/views.svg" alt="">
                                        <p>250</p>
                                    </div>
                                </div>

                                <div class="author-posts">
                                    <a href="" class="author-posts__link">50 постов в блоге</a>
                                </div>

                            </div>

                        </div>

                    <?php endfor; ?>

                <? endforeach; ?>

            </div>


        </div>

        <!-- second top авторы -->

        <div class="popular-authors__block second-top">

            <div class="author first">

                <!--  Authors image  -->

                <a href="" class="author-image__link">
                    <div class="author-image profile-avatar">
                        <img src="/img/temp/pg_WCHWSdT8.png" alt="">
                    </div>
                </a>

                <!--  Authors description  -->

                <div class="author-description">

                    <div class="author-name">Emillia Johnson</div>

                    <div class="account-info">
                        <div class="author-nickname">@emmijohnson</div>
                        <div class="post-views">
                            <img src="/img/icons/views.svg" alt="">
                            <p>250</p>
                        </div>
                    </div>

                    <div class="author-posts">
                        <a href="" class="author-posts__link">50 постов в блоге</a>
                    </div>

                </div>

            </div>

        </div>


        <!-- all small авторы -->

        <div class="popular-authors__block all-authors">

            <div class="author first">

                <!--  Authors image  -->

                <a href="" class="author-image__link">
                    <div class="author-image profile-avatar">
                        <img src="assets/images/temp/pg_WCHWSdT8.png" alt="">
                    </div>
                </a>

                <!--  Authors description  -->

                <div class="author-description">

                    <div class="author-name">Emillia Johnson</div>

                    <div class="account-info">
                        <div class="author-nickname">@emmijohnson</div>
                        <div class="post-views">
                            <img src="assets/images/icons/views.svg" alt="">
                            <p>250</p>
                        </div>
                    </div>

                    <div class="author-posts">
                        <a href="" class="author-posts__link">50 постов в блоге</a>
                    </div>

                </div>

            </div>

        </div>

    </section>

</main>
