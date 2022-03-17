<?php

namespace app\controllers;


use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\CartForm;
use app\models\BuyModel;
use app\models\GoodsModel;
use app\models\BuersModel;
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
                $buers_model = new BuersModel();
                $user = $model->user;
                $product = $model->product;
                $count = $model->count;


                $finded_prods = $goods_model->checkProducts($product);
                $id = $buers_model->setBuers($user);
                if(!empty($finded_prods) && $id != false){
                    if($goods_model->setShop($product, $count, $id)){
                        $params = ['prod' => $finded_prods,'client' => $user, 'count' => $count, 'id' => $id];

                           /* Не обязательный момент, т.к. по сути заказ разбит на 2 таблицы и в целом можно даже сделать спокойно вывод данных
                              сделав запрос с join'ом по id заказа, но допустим что нужно писать данные в таблицу для
                              внешнего интерфейса в определенную таблицу т.к. у этого интерфейса есть доступ только к ней
                           */
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
