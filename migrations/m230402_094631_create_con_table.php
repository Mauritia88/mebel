<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%con}}`.
 */
class m230402_094631_create_con_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'con1', 'order', 'client_id', 'client', 'client_id', 'CASCADE'
        );

        $this->addForeignKey(
            'con2', 'product', 'status_id', 'statusProduct', 'id', 'CASCADE'
        );

        $this->addForeignKey(
            'con3', 'product', 'category_id', 'category', 'id', 'CASCADE'
        );
        $this->addForeignKey(
            'con4', 'orderItem', 'order_id', 'order', 'id', 'CASCADE'
        );
        $this->addForeignKey(
            'con5', 'orderItem', 'product_id', 'product', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('con1', 'order');
        $this->dropForeignKey('con2', 'product');
        $this->dropForeignKey('con3', 'product');
        $this->dropForeignKey('con4', 'orderItem');
        $this->dropForeignKey('con5', 'orderItem');
    }
}
