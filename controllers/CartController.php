<?php

namespace app\controllers;

use app\models\BuyModel;
use app\models\GoodsModel;
use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\CartForm;
use yii\web\Request;


class CartController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionForm()
    {
            $model = new CartForm();
            if($model->load(\Yii::$app->request->post())){
                $goods_model = new GoodsModel();
                $user = $model->user;
                $product = $model->product;
                $count = $model->count;
                if(!empty($goods_model->checkProducts($product))){
                    $count = $goods_model->checkCount($product, $count);
                    $params = ['prod' => $product,'client' => $user, 'count' => $count];
                    if($count > 0){
                        $model_checkout = new BuyModel();
                        if($model_checkout->approveBuy($params)){
                            $this->view->params['info'] = $params;
                            return $this->render('checkout');
                        }
                    }else{
                        return $this->render('none');
                    }
                }else{
                    return $this->render('out');
                }

            }
            return $this->render('form', compact('model'));


        }


}
