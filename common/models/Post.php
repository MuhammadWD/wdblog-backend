<?php

namespace common\models;

use frontend\models\Comment;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\redis\Connection;

/**
 * This is the model class for table "default".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $url
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $photo
 * @property int|null $viewed
 * @property int|null $author_id
 * @property int|null $status
 * @property int|null $category_id
 *
 * @property Comment[] $comments
 * @property PostTag[] $postTags
 */
class Post extends ActiveRecord
{
    public $tags_val;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'content'], 'string'],
            [['date'], 'safe'],
            [['viewed', 'author_id', 'status', 'category_id'], 'integer'],
            [['title', 'photo'], 'string', 'max' => 255],
            [['tags_val'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'url' => 'ЧПУ',
            'description' => 'Описание',
            'content' => 'Текст',
            'date' => 'Дата',
            'photo' => 'Изображение',
            'viewed' => 'Просмотры',
            'author_id' => 'Автор',
            'status' => 'Статус',
            'category_id' => 'Категории',
            'tags_val' => 'Тэги'
        ];
    }

    public function beforeDelete()
    {
        if(parent::beforeDelete()){
            PostTag::deleteAll(['post_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        $this->tags_val = ArrayHelper::map($this->tag, 'title', 'id');
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if(is_array($this->tags_val)){
            $old_tags = ArrayHelper::map($this->tag, 'id', 'id');
            foreach ($this->tags_val as $one_new){
                if(isset($old_tags[$one_new])){
                    unset($old_tags[$one_new]);
                } else {
                    $this->createNewTag($one_new);
                }
            }
            PostTag::deleteAll(['and', ['post_id' => $this->id], ['tag_id' => $old_tags]]);
        } else {
            PostTag::deleteAll(['post_id' => $this->id]);
        }
    }

    private function createNewTag($newTags){
        if(!$tag = Tag::find()->andWhere(['title' => $newTags])->one()){
            $tag = new Tag();
            $tag->title = $newTags;
            if(!$tag->save()){
                $tag = null;
            }
        }
        if($tag instanceof Tag){
            $post_tag = new PostTag();
            $post_tag->post_id = $this->id;
            $post_tag->tag_id = $tag->id;
            if($post_tag->save()){
                return $post_tag->id;
            }
        }
        return false;
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostTags]].
     *
     * @return ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }
    public function getTag(){
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->via('postTags');
    }
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function getImage()
    {
        return Yii::$app->storage->getFile($this->photo);
    }
}
