<?php

namespace app\controllers;

use app\models\AppartmentModel;
use app\models\ApplicationModel;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * ApplicationsController implements the CRUD actions for ApplicationModel model.
 */
class ApplicationsController extends Controller
{

    // public $modelClass = 'app\models\ApplicationModel';
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
     * Lists all ApplicationModel models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $applications = ApplicationModel::find();
        // $dataProvider = new ActiveDataProvider([
        //     'query' => ApplicationModel::find(),
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

        $searchModel = new ApplicationModel();

        $dataProvider = $searchModel->search(Yii::$app->request->get(),$applications);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single ApplicationModel model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ApplicationModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($appartment_id)
    {
        if (!AppartmentModel::findOne(['id' => $appartment_id])) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }    

        $model = new ApplicationModel();
        if ($this->request->isPost) {
            if ($model->load(array_merge_recursive(
                $this->request->post(),
                ['ApplicationModel' => ['appartment_id' => $appartment_id, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]]
            )) && $model->save()) {
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->goHome();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ApplicationModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = $this->findModel($id);

        if (
            $this->request->isPost &&
            $model->load(
                $this->request->post('ApplicationModel')['status'] === ApplicationModel::STATUS_CUSTOMER
                    ?
                    array_merge_recursive(
                        $this->request->post(),
                        ['ApplicationModel' => ['date_of_purchase' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]]
                    )
                    :
                    array_merge_recursive(
                        $this->request->post(),
                        ['ApplicationModel' => ['updated_at' => date("Y-m-d H:i:s")]]
                    )
            ) &&
            $model->save()
        ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ApplicationModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApplicationModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ApplicationModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApplicationModel::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
