<?php
namespace frontend\controllers;

use common\models\Post;
use common\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $posts = Post::find()->with('author', 'category', 'tag')->where(['status' => 1])
            ->orderBy('date DESC')->all();
        $big_top = Post::find()->with('author', 'category', 'tag')->where(['status' => 1, 'viewed' => 50])
            ->orderBy('date DESC')->all();

        return $this->render('index', [
            'posts' => $posts,
            'top' => $big_top,
        ]);
    }

    /**
     * Displays news page.
     *
     * @return mixed
     */
    public function actionNews()
    {
        $news = Post::find()->with('author', 'category', 'tag')->where(['status' => 1, 'category_id' => 3])
            ->orderBy('date DESC')->all();
        return $this->render('news', [
            'posts' => $news,
        ]);
    }
    /**
     * Displays about page.
     *
     * @return mixed
     */
    /**
     * Displays news page.
     *
     * @return mixed
     */
    public function actionArticles()
    {
        $articles = Post::find()->with('author', 'category', 'tag')->where(['status' => 1, 'category_id' => 4])
            ->orderBy('date DESC')->all();
        return $this->render('articles', [
            'posts' => $articles,
        ]);
    }
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAuthors()
    {
        $author = User::find()->where(['status' => 10])->all();

        return $this->render('authors', [
            'authors' => $author,
        ]);
    }

}
