<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statusProduct".
 *
 * @property int $id Уникальный идентификатор
 * @property string|null $status_product
 *
 * @property Product[] $products
 */
class StatusProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statusProduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_product'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_product' => 'Status Product',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['status_id' => 'id']);
    }

    public function getColorClass()
    {
        switch ($this->id) {
            case 1:
                return "text-success";
            case 2:
                return "text-warning";
            case 3:
                return "text-warning";
            case 4:
                return "text-success";
            case 5:
                return "text-warning";
            case 6:
                return "text-danger";
            case 7:
                return "text-danger";
            case 8:
                return "text-success";
        }
    }
}
