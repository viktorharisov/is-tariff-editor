<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tariff".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $speed
 */
class Tariff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'speed'], 'required'],
            [['price'], 'number'],
            [['speed'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'speed' => 'Speed',
        ];
    }
}
