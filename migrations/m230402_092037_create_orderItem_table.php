<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orderItem}}`.
 */
class m230402_092037_create_orderItem_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orderItem}}', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'order_id'=> $this->integer()->comment('Идентификатор заказа'),
            'product_id'=> $this->integer()->comment('Идентификатор товара		'),
            'name'=> $this->string()->comment('Наименование товара	'),
            'price'=> $this->decimal(10,2)->comment('Цена товара'),
            'quantity'=> $this->smallInteger()->comment('	Количество в заказе	'),
            'cost'=> $this->decimal(10,2)->comment('Стоимость = Цена * Кол-во	'),
        ]);

        $this->createIndex(
            'idx_4',
            'orderItem',
            'order_id'
        );
        $this->createIndex(
            'idx_5',
            'orderItem',
            'product_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orderItem}}');
    }
}
