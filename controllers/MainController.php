<?php

namespace app\controllers;

use app\models\FlatsModel;
use Yii;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionNewapplication()
    {
        return $this->render('newapplication');
    }
    public function actionNewflat()
    {
        $model = new FlatsModel();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('newflat', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('newflat', ['model' => $model]);
        }
    }
    public function actionApplications()
    {
        return $this->render('applications');
    }

}
