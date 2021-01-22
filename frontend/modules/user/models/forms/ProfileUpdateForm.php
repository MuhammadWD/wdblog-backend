<?php


namespace frontend\modules\user\models\forms;


use common\models\User;
use Yii;
use yii\base\Model;

class ProfileUpdateForm extends Model
{
    public $username;
    public $email;
    public $nickname;
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    /**
     * @var User
     * */
    private $_user;

    /**
     * @param User $user
     * @param array $config
     */
    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        $this->username = $user->username;
        $this->nickname = $user->nickname;
        $this->email = $user->email;

        parent::__construct($config);
    }

    public function rules()
    {
        return[
            [['username', 'email'], 'required'],
            [['username', 'email', 'nickname'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::className(),
                'message' => 'Введенный e-mail уже зарегестрирован в системе',
                'filter' => ['<>', 'id', $this->_user->id]],
            [['nickname'], 'unique', 'targetClass' => User::className(),
                'message' => 'Введенный nickname уже зарегестрирован в системе',
                'filter' => ['<>', 'id', $this->_user->id]],
            ['currentPassword', 'currentPassword'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPassword' => 'Новый пароль',
            'newPasswordRepeat' => 'Повторить новый пароль',
            'currentPassword' => 'Текущий пароль',
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function currentPassword($attribute, $params){
        if(!$this->hasErrors()){
            if(!$this->_user->validatePassword($this->$attribute)){
                $this->addError($attribute, 'Вы ввели неверный пароль, повторите еще раз');
            }
        }
    }

    public function update(){
        if($this->validate()){
            $user = $this->_user;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->nickname = $this->nickname;
            if($this->newPassword != null){
                $user->setPassword($this->newPassword);
            }
            return $user->save();
        } else {
            return false;
        }
    }

}