<?php

namespace app\controllers;

use app\models\AppartmentModel;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppartmentsController implements the CRUD actions for AppartmentModel model.
 */
class AppartmentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AppartmentModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        //select * from `appartments` where not exists (select * from `applications` where `appartments`.`id` = `applications`.`appartment_id` and (`status` = 'customer'))
        $appartment = AppartmentModel::find();
        if (Yii::$app->user->isGuest) {
            $customer = AppartmentModel::STATUS_CUSTOMER;
            $processed = AppartmentModel::STATUS_PROCESSED;
            $now = date("Y-m-d H:i:s");
            $appartment->where(
                "NOT EXISTS (select * from `applications` 
                where `appartments`.`id` = `applications`.`appartment_id` and (`status` = '$customer'
                or (`status` = '$processed') and ('date_meeting' > '$now')))"
            );
        }
        // $dataProvider = new ActiveDataProvider([
        //     'query' => $appartment,
        //     /*
        //     'pagination' => [
        //         'pageSize' => 50
        //     ],
        //     'sort' => [
        //         'defaultOrder' => [
        //             'id' => SORT_DESC,
        //         ]
        //     ],
        //     */
        // ]);

        $searchModel = new AppartmentModel();

        $dataProvider = $searchModel->search(Yii::$app->request->get(),$appartment);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single AppartmentModel model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AppartmentModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AppartmentModel();

        if ($this->request->isPost) {
            if ($model->load(
                array_merge_recursive(
                    $this->request->post(),
                    ['AppartmentModel' => ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]]
                )
            ) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AppartmentModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (
            $this->request->isPost &&
            $model->load(array_merge_recursive(
                $this->request->post(),
                ['AppartmentModel' => ['updated_at' => date('Y-m-d H:i:s')]]
            )) &&
            $model->save()
        ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AppartmentModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppartmentModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AppartmentModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppartmentModel::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
