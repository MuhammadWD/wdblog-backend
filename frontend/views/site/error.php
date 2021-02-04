<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Url;

$this->title = $name;
?>

<main>
    <section class="error-page">
        <div class="preloader">
            <div class="preloader-image">
                <div class="four-zero-four">404</div><img src="/img/logorype.svg" alt="">
            </div>
            <div class="phrase"> Простите, но кажется эта страница<br/> пропала в глубинах мировой паутины </div>
            <div class="loader"></div>
            <div class="load-perc">
                <section class="load-more__button">
                    <a href="<?= Url::to('http://wdblog.com/site/index')?>" class="load-more">На главную</a>
                </section>
            </div>

        </div>
    </section>
</main>
