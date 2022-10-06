<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appartments".
 *
 * @property int $id
 * @property string|null $house_number
 * @property float|null $floor
 * @property int|null $appartment_number
 * @property int|null $number_of_rooms
 * @property float|null $appartment_area
 * @property float|null $living_space
 * @property float|null $price
 * @property string|null $currency
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Applications[] $applications
 */
class AppartmentModel extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 'new';
    const STATUS_PROCESSED = 'processed';
    const STATUS_CUSTOMER = 'customer';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appartments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor', 'appartment_area', 'living_space', 'price'], 'number'],
            [['appartment_number', 'number_of_rooms'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['house_number'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'house_number' => 'House Number',
            'floor' => 'Floor',
            'appartment_number' => 'Appartment Number',
            'number_of_rooms' => 'Number Of Rooms',
            'appartment_area' => 'Appartment Area',
            'living_space' => 'Living Space',
            'price' => 'Price',
            'currency' => 'Currency',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    { 
        return $this->hasMany(ApplicationModel::class, ['appartment_id' => 'id']);
    }
}
