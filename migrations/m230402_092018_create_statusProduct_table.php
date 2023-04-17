<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statusProduct}}`.
 */
class m230402_092018_create_statusProduct_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statusProduct}}', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'status_product'=>$this->string(30),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%statusProduct}}');
    }
}
