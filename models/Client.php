<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $client_id Уникальный идентификатор
 * @property string|null $email
 * @property string|null $name
 * @property string|null $phone
 *
 * @property Order[] $orders
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'string', 'max' => 80],
            [['name'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'email' => 'Email',
            'name' => 'Name',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['client_id' => 'client_id']);
    }
}
