<?php
/**
 * Created by PhpStorm.
 * User: guerosf
 * Date: 10.02.18
 * Time: 22:46
 */

namespace app\controllers;


use app\models\OperationMath;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MathController extends Controller
{
    public function actionIndex()
    {
        $model = new \app\models\FormMath();

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = \Yii::$app->request->post();
            if ($model->load($post)){
                if (!$model->validate()){
                    return ActiveForm::validate($model);
                }
                $operation = new OperationMath([$model->num1,$model->num2],$model->action);
                return ['result' => $operation->result()];
            }

        }

        return $this->render('index', ['model' => $model]);
    }
}