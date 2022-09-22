<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "flats".
 *
 * @property int $id
 * @property int $numberhouse
 * @property int $floor
 * @property int $numberflat
 * @property int $rooms
 * @property float $area
 * @property float $livingspace
 * @property float $cost
 * @property string $status
 * @property string|null $booked
 * @property string|null $purchasedname
 * @property string|null $purchasedphone
 * @property int|null $idapplication
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class FlatsModel extends Model
{
    /**
     * {@inheritdoc}
     */
    public $numberhouse;
    public $floor;
    public $numberflat;
    public $rooms;
    public $area;
    public $livingspace;
    public $cost;
    public $status;
    public $idapplication;
    public $purchasedphone;
    public $purchasedname;

    public static function tableName()
    {
        return 'flats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numberhouse', 'floor', 'numberflat', 'rooms', 'area', 'livingspace', 'cost', 'status'], 'required'],
            [['numberhouse', 'floor', 'numberflat', 'rooms', 'idapplication'], 'integer'],
            [['area', 'livingspace', 'cost'], 'number'],
            [['booked', 'created_at', 'updated_at'], 'safe'],
            [['status', 'purchasedname', 'purchasedphone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numberhouse' => 'Numberhouse',
            'floor' => 'Floor',
            'numberflat' => 'Numberflat',
            'rooms' => 'Rooms',
            'area' => 'Area',
            'livingspace' => 'Livingspace',
            'cost' => 'Cost',
            'status' => 'Status',
            'booked' => 'Booked',
            'purchasedname' => 'Purchasedname',
            'purchasedphone' => 'Purchasedphone',
            'idapplication' => 'Idapplication',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
