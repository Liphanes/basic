<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CartForm extends Model
{

    public $user;
    public $product = [];
    public $count;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['user', 'product', 'count'], 'required'],
            ['product', 'each', 'rule' => ['string']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user' => 'Имя клиента',
            'product' => 'Заказываемые блюда',
            'count' => 'Количество персон',
        ];
    }

    public function getCart(){
        if(!empty($user) && !empty($product) && !empty($count)){

            $data['user'] = $user;
            $data['product'] = $product;
            $data['count'] = $count;
            return $data;
        }
        return false;
    }
}
