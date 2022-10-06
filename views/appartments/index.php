<?php

use app\models\AppartmentModel;
use app\models\ApplicationModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\DataColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Appartment Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appartment-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Appartment Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- <?= var_dump($dataProvider); ?> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'text-wrap'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'house_number',
            'floor',
            'appartment_number',
            'number_of_rooms',
            'appartment_area',
            'living_space',
            [
                'class' => DataColumn::class,
                'label' => 'Price',
                'attribute' => 'price',
                'value' => function ($data) {
                    return $data->price . ' ' . $data->currency;
                }
            ],
            [
                'attribute' => 'id',
                'label' => 'Add application',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a('Add application', Url::toRoute(['applications/create', 'appartment_id' => $data->id]), ['class' => 'btn btn-success']);
                }
            ],
            [
                'label' => 'Status',
                'attribute' => 'applications.*.status',
                'value' => function ($data) {
                    // var_dump($data->getApplications()->where(['status'=>ApplicationModel::STATUS_CUSTOMER])->orwhere(['status'=>ApplicationModel::STATUS_PROCESSED])->one()->status);
                    // return $data->getApplications()->where(['status'=>ApplicationModel::STATUS_PROCESSED,'status'=>ApplicationModel::STATUS_CUSTOMER])->one()->status;
                    return $data->getApplications()
                        ->where(['status' => ApplicationModel::STATUS_CUSTOMER])
                        ->orwhere(['status' => ApplicationModel::STATUS_PROCESSED])
                        ->andwhere(['>=','date_meeting',date("Y-m-d H:i:s")])
                        ->one()
                        ->status ?? AppartmentModel::STATUS_NEW;
                    // return $data->applications[0]->status;
                },
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Booked before',
                'attribute' => 'applications.*.date_meeting',
                'value' => function ($data) {
                    return $data->getApplications()
                    ->where(['status' => ApplicationModel::STATUS_CUSTOMER])
                    ->orwhere(['status' => ApplicationModel::STATUS_PROCESSED])
                    ->andwhere(['>=','date_meeting',date("Y-m-d H:i:s")])
                    ->one()->date_meeting;
                    // return $data->applications[0]->date_meeting;
                },
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Purchased full name',
                'attribute' => 'applications.*.full_name',
                'value' => function ($data) {
                    return $data->getApplications()
                    ->where(['status' => ApplicationModel::STATUS_CUSTOMER])
                    ->orwhere(['status' => ApplicationModel::STATUS_PROCESSED])
                    ->andwhere(['>=','date_meeting',date("Y-m-d H:i:s")])
                    ->one()->full_name;
                    // return $data->applications[0]->full_name;
                },
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Purchased phone number',
                'attribute' => 'applications.*.phone_number',
                'value' => function ($data) {
                    // return $data->applications[0]->phone_number;
                    return $data->getApplications()
                    ->where(['status' => ApplicationModel::STATUS_CUSTOMER])
                    ->orwhere(['status' => ApplicationModel::STATUS_PROCESSED])
                    ->andwhere(['>=','date_meeting',date("Y-m-d H:i:s")])
                    ->one()->phone_number;
                },
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AppartmentModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'visible' => !Yii::$app->user->isGuest
            ],
        ],
    ]); ?>


</div>