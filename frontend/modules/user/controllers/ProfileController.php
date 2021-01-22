<?php


namespace frontend\modules\user\controllers;

use common\models\User;
use frontend\modules\user\models\forms\ImageForm;
use frontend\modules\user\models\forms\ProfileUpdateForm;
use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class ProfileController extends Controller
{
    public function actionView($nickname){
        $currentUser = Yii::$app->user->identity;

        return $this->render('view', [
            'user' => $this->findUser($nickname),
            'currentUser' => $currentUser,
        ]);
    }

    public function actionUpdate(){
        $user = $this->findModel();
        $model = new ProfileUpdateForm($user);
        $modelImage = new ImageForm();

        if($model->load(Yii::$app->request->post()) && $model->update()){
            return $this->redirect(['profile/view', 'nickname' => $user->getNickname()]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelImage' => $modelImage
            ]);
        }
    }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }

    /**
     * Handle profile image upload via ajax request
     */
    public function actionUploadImage()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new ImageForm();
        $model->image = UploadedFile::getInstance($model, 'image');

        if ($model->validate()) {

            $user = User::findOne(Yii::$app->user->identity);
            $user->image = Yii::$app->storage->saveUploadedFile($model->image);

            if ($user->save(false, ['image'])) {
                return [
                    'success' => true,
                    'pictureUri' => Yii::$app->storage->getFile($user->image),
                ];
            }
        }
        return ['success' => false, 'errors' => $model->getErrors()];
    }

    //Система подписок
    public function  actionFollow($id){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['user/default/login']);
        }
        /* @var $currentUser User*/
        $currentUser = Yii::$app->user->identity;
        $user = $this->findUserById($id);

        $currentUser->followUser($user);

        return $this->redirect(['profile/view', 'nickname' => $user->getNickname()]);
    }

    public function  actionUnfollow($id){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['user/default/login']);
        }
        /* @var $currentUser User*/
        $currentUser = Yii::$app->user->identity;
        $user = $this->findUserById($id);

        $currentUser->unfollowUser($user);
        return $this->redirect(['profile/view', 'nickname' => $user->getNickname()]);
    }

    /**
     * @param string $nickname
     * @return array|User|ActiveRecord
     * @throws NotFoundHttpException
     */
    private function  findUser($nickname){
        if($user = User::find()->where(['nickname' => $nickname])->orWhere(['id' => $nickname])->one()){
            return $user;
        }
        throw new NotFoundHttpException();
    }

    /**
     * @param $id
     * @return array|User|ActiveRecord
     * @throws NotFoundHttpException
     */
    private function findUserById($id){
        if($user = User::findOne($id)){
            return $user;
        }
        throw new NotFoundHttpException;
    }

}