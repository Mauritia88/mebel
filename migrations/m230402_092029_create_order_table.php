<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m230402_092029_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'client_id' => $this->integer()->comment('Идентификатор пользователя'),
            'name' => $this->string()->comment('Имя и фамилия покупателя'),
            'email' => $this->string(80)->comment('Почта покупателя'),
            'phone' => $this->string(20)->comment('Телефон покупателя'),
            'address' => $this->string(255)->comment('Адрес доставки'),
            'comment' => $this->string(255)->comment('Комментарий к заказу'),
            'amount' => $this->decimal(10, 2)->comment('Сумма заказа'),
            'status' => $this->tinyInteger()->defaultValue(0)->comment('Статус заказа'),
            'created' => $this->dateTime()->notNull()->comment('Дата и время создания')->defaultValue(new \yii\db\Expression('NOW()'))
        ]);

        $this->createIndex(
            'idx_3',
            'order',
            'client_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
