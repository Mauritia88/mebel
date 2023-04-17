<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m230402_092102_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'client_id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'email' => $this->string(80),
            'name' => $this->string(50),
            'phone' => $this->string(13)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
