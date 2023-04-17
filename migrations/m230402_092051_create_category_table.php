<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m230402_092051_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'parent_id' => $this->integer()->comment('Родительская категория'),
            'name' => $this->string()->comment('Название категория'),
            'content' => $this->string()->comment('Описание категория'),
            'image' => $this->string()->comment('Имя файла изображения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
