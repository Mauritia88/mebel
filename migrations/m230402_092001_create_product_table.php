<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230402_092001_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'title' => $this->string()->comment('Наименование товара'),
            'desc' => $this->text()->comment('Описание продукта'),
            'price'=>$this->float()->comment('Цена товара'),
            'image' => $this->string()->comment('Имя файла изображения продукта'),
            'category_id' => $this->integer()->comment('Категория продукта'),
            'status_id' => $this->integer()->comment('Статус продукта'),
        ]);


        $this->createIndex(
            'idx_1',
            'product',
            'status_id'
        );

        $this->createIndex(
            'idx_2',
            'product',
            'category_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
