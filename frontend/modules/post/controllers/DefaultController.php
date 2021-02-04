<?php

namespace frontend\modules\post\controllers;

use common\models\Category;
use common\models\Post;
use common\models\User;
use frontend\modules\post\models\forms\PostForm;
use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreate()
    {
        $user = User::findOne(Yii::$app->user->identity);
        $model = new PostForm($user);
        $category = Category::find()->all();

        if($model->load(Yii::$app->request->post())){
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Пост отправлен на модерацию');
                return $this->goHome();
            }
        }
        return $this->render('create', [
            'model' => $model,
            'category' => $category,
        ]);
    }

    public function actionView($url){
        $currentUser = Yii::$app->user->identity;
        $thisCategory = Post::findAll('category');

        $category_aside = Post::find()->where(['category' => $thisCategory, 'viewed' => '20']);

        return $this->render('view', [
            'post' => $this->findPost($url),
            'currentUser' => $currentUser,
            'categoryAside' => $category_aside,
        ]);
    }

    /**
     * @param string $url
     * @return array|User|ActiveRecord
     * @throws NotFoundHttpException
     */
    private function findPost($url)
    {
        if ($user = Post::find()->where(['url' => $url, 'status' => 1])->orWhere(['id' => $url])->one()) {
            return $user;
        }
        throw new NotFoundHttpException();
    }
}
