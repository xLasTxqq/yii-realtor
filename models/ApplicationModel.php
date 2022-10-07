<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $phone_number
 * @property string|null $client_comment
 * @property string $status
 * @property string|null $date_meeting
 * @property string|null $manager_comment
 * @property string|null $date_of_purchase
 * @property int $appartment_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Appartments $appartment
 */
class ApplicationModel extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 'new';
    const STATUS_PROCESSED = 'processed';
    const STATUS_CUSTOMER = 'customer';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params, $query)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate(
            [
                'full_name',
                'phone_number',
                'created_at',
                'client_comment',
                'status',
                'date_meeting',
                'manager_comment',
                'date_of_purchase',
            ]
        ))) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'client_comment', $this->client_comment])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'date_meeting', $this->date_meeting])
            ->andFilterWhere(['like', 'manager_comment', $this->manager_comment])
            ->andFilterWhere(['like', 'date_of_purchase', $this->date_of_purchase]);

        return $dataProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_comment', 'manager_comment'], 'string'],
            [['date_meeting', 'date_of_purchase', 'created_at', 'updated_at'], 'safe'],
            [['appartment_id'], 'required'],
            [['appartment_id'], 'integer'],
            [['full_name', 'phone_number', 'status'], 'string', 'max' => 255],
            [['appartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => AppartmentModel::class, 'targetAttribute' => ['appartment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'phone_number' => 'Phone Number',
            'client_comment' => 'Client Comment',
            'status' => 'Status',
            'date_meeting' => 'Date Meeting',
            'manager_comment' => 'Manager Comment',
            'date_of_purchase' => 'Date Of Purchase',
            'appartment_id' => 'Appartment ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Appartment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppartment()
    {
        return $this->hasOne(AppartmentModel::class, ['id' => 'appartment_id']);
    }
}
