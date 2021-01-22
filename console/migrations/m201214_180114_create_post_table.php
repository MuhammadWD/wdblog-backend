<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%default}}`.
 */
class m201214_180114_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'reference' => $this->string(),
            'description' => $this->text(),
            'content' => $this->text(),
            'date' => $this->date(),
            'photo' => $this->string(),
            'viewed' => $this->integer(),
            'author_id' => $this->integer(),
            'status' => $this->integer()->defaultValue(0),
            'category_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
