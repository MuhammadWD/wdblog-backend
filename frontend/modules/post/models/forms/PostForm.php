<?php

namespace frontend\modules\post\models\forms;

use common\models\Post;
use common\models\User;
use Yii;
use yii\base\Model;

class PostForm extends Model
{
    const MAX_DESCRIPTION_LENGTH = 360;
    const MAX_TITLE_LENGTH = 40;

    public $title;
    public $image;
    public $url;
    public $description;
    public $category;
    public $content;
    public $date;
    public $tags_val;


    private $user;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => ['jpg', 'svg', 'png'],
                'checkExtensionByMimeType' => true],
            [['description'], 'string', 'max' => self::MAX_DESCRIPTION_LENGTH],
            [['title', 'content', 'description', 'url', 'category', 'image'], 'required'],
            [['title'],'string', 'max' => self::MAX_TITLE_LENGTH],
            [['url'], 'string', 'max' => 150],
            [['content'], 'string'],
            [['tags_val', 'date'], 'safe']
        ];
    }

    /**
     * @param User $user
     * @param array $config
     */
    public function __construct(User $user, $config = [])
    {
        $this->user = $user;
        parent::__construct($config);
    }

    public function save()
    {
        if($this->validate()){
            $post = new Post();
            $post->title = $this->title;
            $post->description = $this->description;
            $post->content = $this->content;
            $post->url = $this->url;
            $post->date = $this->date;
            $post->category_id = $this->category;
            $post->tags_val = $this->tags_val;
            $post->photo = Yii::$app->storage->saveUploadedFile($this->image);
            $post->author_id = $this->user->getId();
            return $post->save(false);
        }
        return null;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'url' => 'ЧПУ',
            'description' => 'Описание',
            'content' => 'Текст',
            'image' => 'Изображение',
            'status' => 'Статус',
            'category_id' => 'Категория',
            'tags_val' => 'Тэги',
            'date' => 'Дата'
        ];
    }
}