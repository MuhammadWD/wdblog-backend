<?php

/* @var $this yii\web\View */
/* @var $content string */
/* @var $user common\models\User */
/* @var $login common\models\LoginForm */
/* @var $register frontend\models\SignupForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php $this->registerCsrfMetaTags() ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Useful meta tags -->
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Url::to(['img/favicon.png'])]); ?>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

    <div class="preloader">
        <div class="preloader-image">
            <img src="img/logorype.svg" alt="">
        </div>
        <div class="loader"></div>
        <div class="load-perc">
            <span class="perc">0%</span>
        </div>
    </div>

<div class="wrapper">
    <header class="header">
        <section class="header-top">
            <div class="user-join">
                <?php if(Yii::$app->user->isGuest):?>
                    <button class="user-btn popup-btn" data-path="login-form"><img class="user-icon" src="/img/guest.svg" alt="join-icon"></button>
                <?php else: ?>
                    <a style="color: #3a3a3a;" href="<?= Url::to('user/profile/view', ['nickname' => $user->nickname])?>">
                        <?= $user->username ?></a>
                <?php endif; ?>
            </div>
            <div class="logo">
                <a class="desktop-logo" href="<?= Url::to('site/index')?>"><img src="/img/logorype.svg" alt="desktop-logo"></a>
                <a class="mobile-logo" href="<?= Url::to('site/index')?>"><img src="/img/mobile-logo.svg" alt="mobil-logo"></a>
            </div>
            <div class="left-group">
                <div class="search-icon">
                    <button class="search-btn"><img src="/img/icons/search.svg" alt="search-icon"></button>
                    <input class="search-input" type="text" placeholder="Поиск по сайту...">
                </div>
                <div id="burger-toggle" class="burger-menu">
                    <span class="burger-menu__lines"></span>
                </div>
            </div>
        </section>

        <!--  Burger plashka here  -->

        <div class="menu-plashka">
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="<?= Url::to('site/index')?>" class="menu-link"><img src="/img/icons/menu/menu-home.svg" alt="home-icon"> Главная</a>
                </li>
                <li class="menu-item">
                    <a href="<?= Url::to('site/categories')?>" class="menu-link"><img class="list" src="/img/icons/menu/menu-link.svg" alt="category-icon"> Категории</a>
                </li>
                <li class="menu-item">
                    <a href="<?= Url::to('site/feed')?>" class="menu-link"><img src="/img/icons/menu/menu-feed.svg" alt="feed-icon"> Лента</a>
                </li>
                <li class="menu-item">
                    <a href="<?= Url::to('site/about')?>" class="menu-link"><img class="info" src="/img/icons/menu/menu-info.svg" alt="about-icon"> О проекте</a>
                </li>
            </ul>
            <div class="menu-categories">
                <ul class="categories-list">
                    <li class="categories-item">
                        <a href="<?= Url::to('post/categories/beginners')?>" class="categories-link">Начинающим</a>
                    </li>
                    <li class="categories-item">
                        <a href="<?= Url::to('post/categories/frontend')?>" class="categories-link">Фронтенд</a>
                    </li>
                    <li class="categories-item">
                        <a href="<?= Url::to('post/categories/backend')?>" class="categories-link">Бэкенд</a>
                    </li>
                    <li class="categories-item">
                        <a href="<?= Url::to('post/categories/design')?>" class="categories-link">Design</a>
                    </li>
                    <li class="categories-item">
                        <a href="<?= Url::to('post/categories/news')?>" class="categories-link">Новости</a>
                    </li>
                    <li class="categories-item">
                        <a href="<?= Url::to('post/categories/history')?>" class="categories-link">Истории</a>
                    </li>
                    <li class="categories-item">
                        <a href="<?= Url::to('site/authors')?>" class="categories-link">Авторы</a>
                    </li>
                </ul>
            </div>
        </div>

        <!--  Header categories here  -->

        <div class="header-categories">
            <ul class="categories-list">
                <li class="categories-item">
                    <a href="<?= Url::to('post/categories/beginners')?>" class="categories-link">Начинающим</a>
                </li>
                <li class="categories-item">
                    <a href="<?= Url::to('post/categories/frontend')?>" class="categories-link">Фронтенд</a>
                </li>
                <li class="categories-item">
                    <a href="<?= Url::to('post/categories/backend')?>" class="categories-link">Бэкенд</a>
                </li>
                <li class="categories-item">
                    <a href="<?= Url::to('post/categories/design')?>" class="categories-link">Design</a>
                </li>
                <li class="categories-item">
                    <a href="<?= Url::to('post/categories/news')?>" class="categories-link">Новости</a>
                </li>
                <li class="categories-item">
                    <a href="<?= Url::to('post/categories/history')?>" class="categories-link">Истории</a>
                </li>
                <li class="categories-item">
                    <a href="<?= Url::to('site/authors')?>" class="categories-link">Авторы</a>
                </li>
            </ul>
        </div>
    </header>
    <section id="popup" class="popup" >
        <div class="popup-body">

            <!--  Попап регистрации  -->

            <div class="popup-content first" data-target="reg-form">

                <div class="join-with__mediabtn">
                    <h3>Зарегестрироваться используя соц. сети</h3>
                    <ul class="media-list">
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/facebook-circle.svg" alt=""></a>
                        </li>
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/google-circle.svg" alt=""></a>
                        </li>
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/twitter-circle.svg" alt=""></a>
                        </li>
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/vk-circle.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="join-block">
                    <h3>или используя почту</h3>
                    <?php $form = ActiveForm::begin(['class' => 'join-form']); ?>

                        <?= $form->field($login, 'email')->textInput()->label('Email') ?>

                        <?= $form->field($login, 'username')->textInput(['autofocus' => true])
                            ->label('Username'); ?>

                        <? $form->field($login, 'password')->passwordInput()->label('Password') ?>

                        <div class="toggle-button toggle-button--tuli">
                            <input id="toggleButton11" type="checkbox">
                            <label for="toggleButton11">Я принимаю условаия
                                <a class="politica-conf" href="">Политики конфиденциальности</a></label>
                            <div class="toggle-button__icon"></div>
                        </div>

                        <div class="join-buttons">
                            <?= Html::submitButton('Регистрация', ['class' => 'join-btn']) ?>
                            <a class="other-btn popup-btn" data-path="login-form" >Вход</a>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <!--  Попап авторизации  -->

            <div class="popup-content second" data-target="login-form">

                <div class="join-with__mediabtn">
                    <h3>Войти используя соц. сети</h3>
                    <ul class="media-list">
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/facebook-circle.svg" alt=""></a>
                        </li>
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/google-circle.svg" alt=""></a>
                        </li>
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/twitter-circle.svg" alt=""></a>
                        </li>
                        <li class="media-item">
                            <a href="" class="media-link"><img src="/img/icons/social/vk-circle.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="join-block">
                    <h3>или используя почту</h3>
                    <?php $form = ActiveForm::begin(['class' => 'join-form']); ?>
                    <form action="" class="join-form">

                        <?= $form->field($register, 'email')->textInput(['maxLength' => true])->label('Email'); ?>

                        <label for="psw">Password</label>
                        <?= $form->field($register, 'password')->passwordInput()->label('Password'); ?>

                        <div class="toggle-button toggle-button--tuli">
                            <? // $form->field($register, 'rememberMe')->checkbox(['id' => 'toggleButton12'])->label('Запомнить меня') ?>
                            <div class="toggle-button__icon"></div>
                        </div>

                        <div class="join-buttons">
                            <?= Html::submitButton('Вход', ['class' => 'join-btn']) ?>
                            <a class="other-btn popup-btn" data-path="reg-form">Регистрация</a>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <!--  Edit profile popup  -->

            <div class="popup-content __edit-user" data-target="popup-edit" >
                <div class="popup-header">
                    <div class="popup-title">Редактирование аккаунта</div>
                    <a class="close-popup modal-close">
                        <img src="img/icons/exit.svg" alt="">
                    </a>
                </div>
                <div class="popup-entry">

                    <!--  User personal information  -->

                    <div class="personal-info">

                        <h2>Персональная информация</h2>

                        <!--  Кнопки сменя фотографий  -->

                        <div class="personal-buttons">
                            <button class="load-image buttn">Сменить фото</button>
                            <button class="change-fon buttn">Сменить фон</button>
                        </div>

                        <!--  Форма смены данных  -->

                        <form action="" class="perfonal-change edit-form">

                            <div class="username-form editing-forms">
                                <label for="username">Юзернейм</label>
                                <input type="text" placeholder="Users name here" name="username" required>
                            </div>

                            <div class="email-form editing-forms">
                                <label for="email">Email</label>
                                <input type="text" placeholder="yourmail@example.com" name="email" required>
                            </div>

                            <div class="password-form editing-forms">
                                <label for="nick">Никнейм</label>
                                <input type="text" placeholder="*******" name="nick"required>
                            </div>

                        </form>

                    </div>

                    <!--  User personal information  -->

                    <div class="personal-media">

                        <h2 class="no-btn">Соц. сети</h2>

                        <form action="" class="media-change edit-form">

                            <div class="vk-form editing-forms">
                                <label for="vk">VK</label>
                                <input type="text" placeholder="vk.com/" name="vk" required>
                            </div>

                            <div class="google-form editing-forms">
                                <label for="ggl">Google</label>
                                <input type="text" placeholder="accountt.google.com/" name="ggl"required>
                            </div>

                            <div class="twitter-form editing-forms">
                                <label for="tw">Twitter</label>
                                <input type="text" placeholder="twitter.com/" name="tw"required>
                            </div>

                            <div class="facebook-form editing-forms">
                                <label for="fb">Facebook</label>
                                <input type="text" placeholder="facebook.com/" name="fb"required>
                            </div>

                        </form>
                    </div>

                    <!--  User personal information  -->

                    <div class="personal-password">

                        <h2 class="no-btn">Смена пароля</h2>

                        <form action="" class="password-change edit-form">

                            <div class="password-form editing-forms">
                                <label for="psw">Текущий пароль</label>
                                <input type="password" placeholder="*******" name="psw"required>
                            </div>

                            <div class="password-form editing-forms">
                                <label for="psw">Новый пароль</label>
                                <input type="password" placeholder="*******" name="psw"required>
                            </div>

                            <div class="password-form editing-forms">
                                <label for="psw">Подтвердить пароль</label>
                                <input type="password" placeholder="*******" name="psw"required>
                            </div>

                        </form>

                    </div>

                    <!--  User personal information  -->

                    <div class="personal-subscribing">

                        <h2 class="no-btn">Подписка</h2>

                        <div class="lern-more-about">
                            <a href="" class="lern-more__link">Подробнее о подписке и ее преимуществах</a>
                        </div>

                        <div class="subscribe-pay">
                            <button class="pay-button buttn" name="subsc">Оплатить</button>
                            <label for="subsc">Оплачивая подписку, вы прининимаете условия
                                <a href="" class="politica-conf">пользовательского соглашения</a>
                            </label>
                        </div>

                    </div>

                </div>

                <!--  Popups footer  -->

                <div class="popup-footer">
                    <button class="save-info buttn">Сохранить</button>
                </div>

            </div>

        </div>
    </section>

    <?= $content ?>

    <footer class="footer">
        <div class="footer-container">

            <div class="footer__center-block">

                <!--  Логотип  -->

                <div class="logotype">
                    <img src="/img/large-logo.svg" alt="">
                </div>

                <!--  Usefull information  -->

                <div class="contacts">
                    <p class="email">По всем вопросам писать на:
                        <a href="mailto:info@wdblog.ru">info@wdblog.ru</a>
                    </p>
                </div>

                <div class="social-media">
                    <a href="" class="media-link"><img src="/img/icons/social/105-VK.svg" alt=""></a>
                    <a href="" class="media-link"><img src="/img/icons/social/089-telegram.svg" alt=""></a>
                    <a href="" class="media-link"><img src="/img/icons/social/116-youtube.svg" alt=""></a>
                    <a href="" class="media-link"><img src="/img/icons/social/083-stack overflow.svg" alt=""></a>
                    <a href="" class="media-link"><img src="/img/icons/social/032-github.svg" alt=""></a>
                </div>
                <p class="copyright">Copyright @ 2020 WDBlog</p>
            </div>

        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
