<?php


namespace app\controllers;


use app\controllers\actions\MainCloseShiftAction;
use app\controllers\actions\MainGetGoodsAction;
use app\controllers\actions\MainOpenShiftAction;
use app\controllers\actions\MainPrintReceiptAction;
use app\controllers\actions\MainStatusAction;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class MainController extends Controller
{
    public $enableCsrfValidation = false;

    public function actions()
    {
        return [
            'getGoods'=>['class'=>MainGetGoodsAction::class],
            'print'=>['class'=>MainPrintReceiptAction::class],
            'status'=>['class'=>MainStatusAction::class],
            'openShift'=>['class'=>MainOpenShiftAction::class],
            'closeShift'=>['class'=>MainCloseShiftAction::class],
        ];
    }

    public function behaviors()
    {
        return ArrayHelper::merge([
            'corsFilter'  => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['POST','GET', 'HEAD', 'OPTIONS'],
                    'Access-Control-Allow-Credentials' => null,
                    'Access-Control-Max-Age' => 3600,
                ],
            ],
        ], parent::behaviors());
    }
}