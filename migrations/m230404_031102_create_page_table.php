<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m230404_031102_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'parent_id' => $this->integer()->comment('Родительская страница'),
            'name' => $this->string(100)->comment('Заголовок страницы'),
            'slug' => $this->string(100)->comment('Для создания ссылки'),
            'content' =>$this->text()->comment('Содержимое страницы')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
