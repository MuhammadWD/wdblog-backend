<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m201214_180938_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'post_id' => $this->integer(),
            'status' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-comment-user_id',
            'comment',
            'user_id'
        );
        $this->addForeignKey(
            'fk-default-user_id',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-post_id',
            'comment',
            'post_id'
        );
        $this->addForeignKey(
            'fk-post_id',
            'comment',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
