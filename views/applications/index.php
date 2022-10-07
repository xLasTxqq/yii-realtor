<?php

use app\models\ApplicationModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\DataColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Application Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Application Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options'=>['class'=>'text-wrap'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'full_name',
            'phone_number',
            'created_at:date:Date of application',
            [
                'class'=>DataColumn::class,
                'label'=>'Number house',
                'attribute'=>'appartment.house_number',
                'value'=>function($data){
                    return $data->appartment->house_number;
                }
            ],
            [
                'class'=>DataColumn::class,
                'label'=>'Number appartment',
                'attribute'=>'appartment.appartment_number',
                'value'=>function($data){
                    return $data->appartment->appartment_number;
                }
            ],
            'client_comment:ntext',
            'status',
            'date_meeting:datetime',
            'manager_comment:ntext',
            'date_of_purchase:date:Agreement date',
            //'appartment_id',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ApplicationModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
